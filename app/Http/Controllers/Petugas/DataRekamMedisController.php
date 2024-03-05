<?php

namespace App\Http\Controllers\Petugas;

use DataTables;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Pasien;
use App\Models\FileUpload;
use Illuminate\Http\Request;
use App\Imports\PasienImport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;

class DataRekamMedisController extends Controller
{
    public function __construct(){
        $this->middleware(['role:petugas']);
    }

    public function index(){
        try {
            $data_pasien = Pasien::where('status', 'active');
            return view('petugas.data-rm.test', ['pasien' => $data_pasien]);
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function getDataRM(Request $request){
        try {
            if ($request->ajax()) {
                $data_pasien = Pasien::where('status', 'active')->get();

                foreach ($data_pasien as $item) {

                    $tgl_krs = Carbon::parse($item->krs);
                    // dd($tgl_krs);
                    $tgl_retensi = Carbon::parse($item->tgl_retensi);
                    $tanggalKadaluwarsa = Carbon::now()->subYears(5)->subDays(5);
                    // dd($tanggalKadaluwarsa);

                    if ($tgl_retensi <= Carbon::now()->addDays(5) || $tgl_retensi <= Carbon::now() || $tgl_krs <= $tanggalKadaluwarsa) {
                        $item->class = 'bg-[#FFC7B6]';
                    } else {
                        $item->class = '';
                    }
                }
                return Datatables::of($data_pasien)

                ->addColumn('edit', function($data_pasien){
                    return ' <a href="/datarekammedis/editdatarekammedis/'. $data_pasien->id .'" class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-yellow-500 leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">
                    Edit
                    </a>
                    ';
                })
                ->addColumn('delete', function($data_pasien){
                    return ' <a href="/deletedatarekammedis/'. $data_pasien->id .'" class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-red-500 leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">
                    Hapus
                    </a>';
                })
                ->addColumn('checkbox', function($data_pasien){
                return  '<input type="checkbox" name="checked[]" class="<input id="default-checkbox" type="checkbox" value="'. $data_pasien->id .'" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 border-rounded-full rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"/> ';
                })
                ->rawColumns(['edit', 'delete', 'checkbox'])
                ->addIndexColumn()
                ->make(true);


                return response()->json($data_pasien);
            }

        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function add(){
        try {
            return view('petugas.data-rm.tambahdata');
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function store(Request $request){
        // dd($request);
        $request->validate([
            'nama' => 'required',
            'no_rm' => 'required',
            'nik' => 'required|max:16',
            'jenis_kelamin' => 'required',
            'jenis_pelayanan' => 'required',
            'dokter' => 'required',
            'mrs' => 'required',
            'krs' => 'required',
            'alamat' => 'required'
        ],
        [
            'required' => 'kolom wajib diisi',
            'nik.max' => 'attribute harus 16 digit',
            'nik.min' => 'attribute harus 16 digit'
        ]
        );
        try {
        $pasien = Pasien::insert([
            'no_rm' => $request->no_rm,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jenis_pelayanan' => $request->jenis_pelayanan,
            'dokter' => $request->dokter,
            'mrs' => $request->mrs,
            'krs' => $request->krs,
            'tgl_retensi' => (new Carbon($request->krs))->addYears(5),
            'alamat' => $request->alamat,
            'status' => 'active',
            ]);
        return redirect()->route('dataRekamMedis')->with('success', 'data pasien berhasil ditambahkan');
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function edit($id){
        try {
            $data_pasien = Pasien::find($id);
            return view('petugas.data-rm.editdata', ['data_pasien' => $data_pasien]);
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function update(Request $request, $id){
        // dd($tgl_retensi);
        $request->validate([
            'nama' => 'required',
            'no_rm' => 'required',
            'nik' => 'required|max:16|min:16',
            'jenis_kelamin' => 'required',
            'jenis_pelayanan' => 'required',
            'dokter' => 'required',
            'mrs' => 'required',
            'krs' => 'required',
            'alamat' => 'required'
        ],
        [
            'required' => 'kolom wajib diisi',
            'nik.max' => 'attribute harus 16 digit',
            'nik.min' => 'attribute harus 16 digit'
        ]
        );

        try {
            $tgl_retensi = (new Carbon($request->krs))->addYears(5);

            $data_pasien = Pasien::find($id)->update([
                'no_rm' => $request->no_rm,
                'nik' => $request->nik,
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'jenis_pelayanan' => $request->jenis_pelayanan,
                'dokter' => $request->dokter,
                'mrs' => $request->mrs,
                'krs' => $request->krs,
                'tgl_retensi' => $tgl_retensi,
                'alamat' => $request->alamat,
                ]);
            // dd($data_pasien);
            return redirect()->route('dataRekamMedis')->with('success', 'data pasien berhasil diubah');

        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function delete($id){
        try {
            Pasien::find($id)->delete();
            return redirect()->route('dataRekamMedis')->with('success', 'data pasien berhasil dihapus');
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    // public function importFile(Request $request){
    //     $this->validate($request, [
	// 		'file' => 'required|mimes:csv,xls,xlsx'
	// 	]);

    //     try {
    //         $file = $request->file('file');
    //         $nama_file = $file->getClientOriginalName();
    //         $path_file = 'data_excel/' . $nama_file;
    //         $file->move('data_excel',$nama_file);

    //         FileUpload::create([
    //             'path_file' => $path_file,
    //             'nama_file' => $nama_file,
    //             'tgl_upload' => $request->tgl_upload,
    //         ]);

    //         $data_pasien = Excel::toArray(new PasienImport, public_path('/data_excel/'.$nama_file));
    //         $data_pasien = $data_pasien[0];
    //         $insert_dataPasien = [];
    //         // (new Carbon($request->krs))->addYears(5)
    //         foreach ($data_pasien as $row) {
    //             $x = intval($row['tgl_daftar']);
    //             $y = intval($row['tgl_pulang']);
    //             $insert_dataPasien[] = [
    //                 'no_rm' => $row['no_rm'],
    //                 'nik' => $row['nik'],
    //                 'nama' => $row['nama'],
    //                 'jenis_kelamin' => $row['jenis_kelamin'],
    //                 'jenis_pelayanan' => $row['jenis_perawatan'],
    //                 'dokter' => $row['nama_dokter'],
    //                 'alamat' => $row['kota'],
    //                 'mrs' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($x),
    //                 'krs' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($y),
    //                 'tgl_retensi' => (new Carbon(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($y)))->addYears(5),
    //                 'status' => 'active',
    //                 // 'lama_dirawat' => $row['lama_dirawat'],
    //                 // 'hari_perawatan' => $row['hari_perawatan'],
    //                 ];
    //         }

    //         // dd($data_pasien);

    //         if (!empty($insert_dataPasien)) {
    //             foreach (array_chunk($insert_dataPasien,1000) as $t) {

    //                 DB::table('pasiens')->insert($t);


    //              }

    //         }
    //         // dd($data_pasien);
    //         return redirect()->route('dataRekamMedis')->with('success', 'data pasien berhasil diimport');

    //     } catch(\Throwable $e){
    //         return redirect()->back()->withError($e->getMessage());
    //     } catch(\Illuminate\Database\QueryException $e){
    //         return redirect()->back()->withError($e->getMessage());
    //     }
    // }

    public function importFile(Request $request){
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        try {
            $file = $request->file('file');
            $nama_file = $file->getClientOriginalName();
            $path_file = 'data_excel/' . $nama_file;
            $file->move('data_excel',$nama_file);

            FileUpload::create([
                'path_file' => $path_file,
                'nama_file' => $nama_file,
                'tgl_upload' => $request->tgl_upload,
            ]);

            $data_pasien = Excel::toArray(new PasienImport, public_path('/data_excel/'.$nama_file));
            $data_pasien = $data_pasien[0];
            $insert_dataPasien = [];

            // dd($data_pasien);

            foreach ($data_pasien as $row) {
                // dd($row['NY. SEFTIYANI GUMARSIH']);
                // if ($row['nama'] === 'TN. RYAN YULIANTO') {
                //     dd($row['tgl_daftar']); // Debug hanya ketika nama cocok
                // }
                $x = intval($row['tgl_daftar']);
                $y = intval($row['tgl_pulang']);
                // Ubah kolom tanggal menjadi format yang diinginkan
                $tgl_daftar = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($x)->format('Y-m-d');
                $tgl_pulang = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($y)->format('Y-m-d');

                $insert_dataPasien[] = [
                    'no_rm' => $row['no_rm'],
                    'nik' => $row['nik'],
                    'nama' => $row['nama'],
                    'jenis_kelamin' => $row['jenis_kelamin'],
                    'jenis_pelayanan' => $row['jenis_perawatan'],
                    'dokter' => $row['nama_dokter'],
                    'alamat' => $row['kota'],
                    'mrs' => $tgl_daftar,
                    'krs' => $tgl_pulang,
                    'tgl_retensi' => (new Carbon($tgl_pulang))->addYears(5)->format('Y-m-d'),
                    'status' => 'active',
                ];
            }

            if (!empty($insert_dataPasien)) {
                foreach (array_chunk($insert_dataPasien,1000) as $t) {
                    DB::table('pasiens')->insert($t);
                }
            }

            return redirect()->route('dataRekamMedis')->with('success', 'Data pasien berhasil diimpor');

        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }


    public function changeStatus(Request $request){
        try {
            $id_pasien = $request->input('checked');
            Pasien::whereIn('id', $id_pasien)
                ->update(['status' => 'inactive']);
            return redirect()->route('dataRekamMedis')->with('success', 'data pasien berhasil diretensi');

        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function search(Request $request){
        try {
            $start_date = $request->start_date;
            $end_date = $request->end_date;

            $pasien = Pasien::whereDate('krs', '>=', $start_date)
                            ->whereDate('krs', '<=', $end_date)
                            ->where('status', 'active')
                            ->get();
            // dd($pasien)
            return view('petugas.data-rm.list', ['pasien' => $pasien]);

        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
