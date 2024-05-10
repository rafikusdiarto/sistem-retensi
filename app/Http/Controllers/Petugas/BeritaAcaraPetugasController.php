<?php

namespace App\Http\Controllers\Petugas;

use PDF;
use Carbon\Carbon;
use App\Models\BeritaAcara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BeritaAcaraLampiran;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;

class BeritaAcaraPetugasController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:petugas']);
    }

    public function index()
    {
        try {
            $data = BeritaAcara::all();
            return view('petugas.berita-acara.index', [
                'data' => $data
            ]);
        } catch (\Throwable $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function create()
    {
        try {
            $user = \Auth::user();
            return view('petugas.berita-acara.create', [
                'user' => $user
            ]);
        } catch (\Throwable $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'nip_petugas' => 'required',
                'nip_ketua_rm' => 'required',
                'direktur' => 'required',
                'nip_direktur' => 'required',
                'no_surat' => 'required',
                'rentang_tahun' => 'required',
                'jumlah_rm' => 'required',
                'jabatan' => 'required',
                'cara_pemusnahan' => 'required',
                'tanggal_pemusnahan' => 'required',
                'waktu_pemusnahan' => 'required',
                'lokasi_pemusnahan' => 'required',
                'ketua_rekam_medis' => 'required',
                'lampiran' => 'required|array',
                'lampiran.*' => 'mimes:pdf',
            ], [
                'required' => ':attribute wajib diisi',
                'mimes' => 'lampiran harus berupa file .pdf',
            ]);
            if ($request->hasFile('lampiran')) {
                $pdf_merge = PDFMerger::init();
                $tanggal = $request->tanggal_pemusnahan;
                $carbonTanggal = Carbon::parse($tanggal);
                $formatTanggal = $carbonTanggal->format('d, F, Y');
                $now = Carbon::now();
                $now_format = $now->format('d, F, Y');
                $namaBulanIndonesia = [
                    'January' => 'Januari',
                    'February' => 'Februari',
                    'March' => 'Maret',
                    'April' => 'April',
                    'May' => 'Mei',
                    'June' => 'Juni',
                    'July' => 'Juli',
                    'August' => 'Agustus',
                    'September' => 'September',
                    'October' => 'Oktober',
                    'November' => 'November',
                    'December' => 'Desember',
                ];

                foreach ($namaBulanIndonesia as $bulanInggris => $bulanIndonesia) {
                    $now_format = str_replace($bulanInggris, $bulanIndonesia, $now_format);
                }
                foreach ($namaBulanIndonesia as $bulanInggris => $bulanIndonesia) {
                    $formatTanggal = str_replace($bulanInggris, $bulanIndonesia, $formatTanggal);
                }
                $dom_pdf = PDF::loadview('petugas.berita-acara.print', [
                    'tahun' => $now->year,
                    'formatTanggal' => $now_format,
                    'nama_petugas' => $request->name,
                    'nip_petugas' => $request->nip_petugas,
                    'nip_ketua_rm' => $request->nip_ketua_rm,
                    'direktur' => $request->direktur,
                    'nip_direktur' => $request->nip_direktur,
                    'no_surat' => $request->no_surat,
                    'jumlah_rm' => $request->jumlah_rm,
                    'rentang_tahun' => $request->rentang_tahun,
                    'jabatan' => $request->jabatan,
                    'cara_pemusnahan' => $request->cara_pemusnahan,
                    'tanggal_pemusnahan' => $now_format,
                    'waktu_pemusnahan' => $request->waktu_pemusnahan,
                    'lokasi_pemusnahan' => $request->lokasi_pemusnahan,
                    'ketua_rm' => $request->ketua_rekam_medis,
                    'lampiran' => 'Berita Acara Pemusnahan ' . $now_format . '.pdf'
                ])->setPaper('legal');
                $path = time() . '.pdf';
                file_put_contents(public_path('/berita_acara/' . $path), $dom_pdf->output());
                $pdf_merge->addPDF(public_path('/berita_acara/' . $path), 'all');

                $files = $request->file('lampiran');
                foreach ($files as $key => $value) {
                    $pdf_merge->addPDF($value->getPathName(), 'all');
                }
                $filename = 'Berita Acara Pemusnahan ' . $now_format . '.pdf';
                $pdf_merge->merge();
                $pdf_merge->save(public_path('/berita_acara/' . $filename));

                $beritaAcara = new BeritaAcara;
                $beritaAcara->user_id = \Auth::user()->id;
                $beritaAcara->name = $request->name;
                $beritaAcara->nip_petugas = $request->nip_petugas;
                $beritaAcara->nip_ketua_rm = $request->nip_ketua_rm;
                $beritaAcara->direktur = $request->direktur;
                $beritaAcara->nip_direktur = $request->nip_direktur;
                $beritaAcara->no_surat = $request->no_surat;
                $beritaAcara->jumlah_rm = $request->jumlah_rm;
                $beritaAcara->rentang_tahun = $request->rentang_tahun;
                $beritaAcara->cara_pemusnahan = $request->cara_pemusnahan;
                $beritaAcara->tanggal_pemusnahan = $request->tanggal_pemusnahan;
                $beritaAcara->waktu_pemusnahan = $request->waktu_pemusnahan;
                $beritaAcara->lokasi_pemusnahan = $request->lokasi_pemusnahan;
                $beritaAcara->ketua_rm = $request->ketua_rekam_medis;
                $beritaAcara->lampiran = $filename;
                $beritaAcara->save();

                if ($request->hasFile('lampiran')) {
                    foreach ($request->file('lampiran') as $file) {
                        $lampiranName = $file->getClientOriginalName();
                        $lampiranPath = 'berita_acara_lampiran/' . $lampiranName;
                        $file->move('berita_acara_lampiran', $lampiranName);
                        $lampiran = new BeritaAcaraLampiran;
                        $lampiran->nama_file = $lampiranName;
                        $lampiran->path_file = $lampiranPath;
                        $beritaAcara->lampirans()->save($lampiran);
                    }
                }

            }

            return redirect()->route('beritaAcara')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $data = BeritaAcara::find($id);
            // $thisFile = $data->lampirans;
            $thisFile = $data->lampirans;
            $newFiles = request()->file('lampiran');
            return view('petugas.berita-acara.edit', [
                'data' => $data,
                'thisFile' => $thisFile,
                'newFiles' => $newFiles
            ]);
        } catch (\Throwable $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'nip_petugas' => 'required',
            'nip_ketua_rm' => 'required',
            'direktur' => 'required',
            'nip_direktur' => 'required',
            'no_surat' => 'required',
            'rentang_tahun' => 'required',
            'jumlah_rm' => 'required',
            'jabatan' => 'required',
            'cara_pemusnahan' => 'required',
            'tanggal_pemusnahan' => 'required',
            'waktu_pemusnahan' => 'required',
            'lokasi_pemusnahan' => 'required',
            'ketua_rekam_medis' => 'required',
        ], [
            'required' => ':attribute wajib diisi',
            'mimes' => 'lampiran harus berupa file .pdf',
        ]);
        try {
            if ($request->hasFile('lampiran')) {
                $pdf_merge = PDFMerger::init();
                $tanggal = $request->tanggal_pemusnahan;
                $carbonTanggal = Carbon::parse($tanggal);
                $formatTanggal = $carbonTanggal->format('d, F, Y');
                $now = Carbon::now();
                $now_format = $now->format('d, F, Y');
                $namaBulanIndonesia = [
                    'January' => 'Januari',
                    'February' => 'Februari',
                    'March' => 'Maret',
                    'April' => 'April',
                    'May' => 'Mei',
                    'June' => 'Juni',
                    'July' => 'Juli',
                    'August' => 'Agustus',
                    'September' => 'September',
                    'October' => 'Oktober',
                    'November' => 'November',
                    'December' => 'Desember',
                ];

                foreach ($namaBulanIndonesia as $bulanInggris => $bulanIndonesia) {
                    $now_format = str_replace($bulanInggris, $bulanIndonesia, $now_format);
                }
                foreach ($namaBulanIndonesia as $bulanInggris => $bulanIndonesia) {
                    $formatTanggal = str_replace($bulanInggris, $bulanIndonesia, $formatTanggal);
                }
                $dom_pdf = PDF::loadview('petugas.berita-acara.print', [
                    'tahun' => $now->year,
                    'formatTanggal' => $now_format,
                    'nama_petugas' => $request->name,
                    'nip_petugas' => $request->nip_petugas,
                    'nip_ketua_rm' => $request->nip_ketua_rm,
                    'direktur' => $request->direktur,
                    'nip_direktur' => $request->nip_direktur,
                    'no_surat' => $request->no_surat,
                    'jumlah_rm' => $request->jumlah_rm,
                    'rentang_tahun' => $request->rentang_tahun,
                    'jabatan' => $request->jabatan,
                    'cara_pemusnahan' => $request->cara_pemusnahan,
                    'tanggal_pemusnahan' => $now_format,
                    'waktu_pemusnahan' => $request->waktu_pemusnahan,
                    'lokasi_pemusnahan' => $request->lokasi_pemusnahan,
                    'ketua_rm' => $request->ketua_rekam_medis,
                    'lampiran' => 'Berita Acara Pemusnahan ' . $now_format . '.pdf'
                ])->setPaper('legal');
                $path = time() . '.pdf';
                file_put_contents(public_path('/berita_acara/' . $path), $dom_pdf->output());
                $pdf_merge->addPDF(public_path('/berita_acara/' . $path), 'all');

                $data = BeritaAcara::find($id);
                $oldPDFs = $data->lampirans->pluck('path_file');

                // Paths ke file PDF baru yang diunggah
                $newPDFs = [];
                foreach (request()->file('lampiran') as $newPDF) {
                    $newPDFs[] = $newPDF;
                }

                // Merge file PDF lama dengan file PDF baru
                foreach ($oldPDFs as $oldPDF) {
                    $pdf_merge->addPDF($oldPDF, 'all'); // Tambahkan file PDF lama
                }
                foreach ($newPDFs as $newPDF) {
                    $pdf_merge->addPDF($newPDF, 'all'); // Tambahkan file PDF baru
                }

                $filename = 'Berita Acara Pemusnahan'  . $now_format . '.pdf';
                $pdf_merge->merge();
                $pdf_merge->save(public_path('/berita_acara/' . $filename));

                $beritaAcara = BeritaAcara::find($id);
                // dd($beritaAcara);
                $beritaAcara->user_id = \Auth::user()->id;
                $beritaAcara->name = $request->name;
                $beritaAcara->nip_petugas = $request->nip_petugas;
                $beritaAcara->nip_ketua_rm = $request->nip_ketua_rm;
                $beritaAcara->direktur = $request->direktur;
                $beritaAcara->nip_direktur = $request->nip_direktur;
                $beritaAcara->no_surat = $request->no_surat;
                $beritaAcara->jumlah_rm = $request->jumlah_rm;
                $beritaAcara->rentang_tahun = $request->rentang_tahun;
                $beritaAcara->cara_pemusnahan = $request->cara_pemusnahan;
                $beritaAcara->tanggal_pemusnahan = $request->tanggal_pemusnahan;
                $beritaAcara->waktu_pemusnahan = $request->waktu_pemusnahan;
                $beritaAcara->lokasi_pemusnahan = $request->lokasi_pemusnahan;
                $beritaAcara->ketua_rm = $request->ketua_rekam_medis;
                $beritaAcara->lampiran = $filename;
                $beritaAcara->save();

                if ($request->hasFile('lampiran')) {
                    foreach ($request->file('lampiran') as $file) {
                        $lampiranName = $file->getClientOriginalName();
                        $lampiranPath = 'berita_acara_lampiran/' . $lampiranName;
                        $file->move('berita_acara_lampiran', $lampiranName);
                        $lampiran = new BeritaAcaraLampiran;
                        // dd($lampiran);
                        $lampiran->nama_file = $lampiranName;
                        $lampiran->path_file = $lampiranPath;
                        $beritaAcara->lampirans()->save($lampiran);
                    }
                }

            }
            return redirect()->route('beritaAcara')->with('success', 'Data berhasil diubah');
        } catch (\Throwable $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            BeritaAcara::find($id)->delete();
            return redirect()->route('beritaAcara')->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function deleteLampiran($id)
    {
        try {

            $lampiran = BeritaAcaraLampiran::find($id);
            $lampiran->delete();
            // if (file_exists(public_path($lampiran->path_file))) {
            //     unlink(public_path($lampiran->path_file));
            // }

            $data = BeritaAcara::find($lampiran->berita_acara_id);
            $dataLampiran = DB::table('berita_acara_lampirans')->where('berita_acara_id', '=', $data->id)->get();



            $pdf_merge = PDFMerger::init();
            $beritaAcara = BeritaAcara::find($lampiran->berita_acara_id);
            $tanggal = $beritaAcara->tanggal_pemusnahan;
            $carbonTanggal = Carbon::parse($tanggal);
            $formatTanggal = $carbonTanggal->format('d, F, Y');
            $now = Carbon::now();
            $now_format = $now->format('d, F, Y');
            $namaBulanIndonesia = [
                'January' => 'Januari',
                'February' => 'Februari',
                'March' => 'Maret',
                'April' => 'April',
                'May' => 'Mei',
                'June' => 'Juni',
                'July' => 'Juli',
                'August' => 'Agustus',
                'September' => 'September',
                'October' => 'Oktober',
                'November' => 'November',
                'December' => 'Desember',
            ];

            foreach ($namaBulanIndonesia as $bulanInggris => $bulanIndonesia) {
                $now_format = str_replace($bulanInggris, $bulanIndonesia, $now_format);
            }
            foreach ($namaBulanIndonesia as $bulanInggris => $bulanIndonesia) {
                $formatTanggal = str_replace($bulanInggris, $bulanIndonesia, $formatTanggal);
            }
            $dom_pdf = PDF::loadview('petugas.berita-acara.print', [
                'tahun' => $now->year,
                'formatTanggal' => $now_format,
                'nama_petugas' => $beritaAcara->name,
                'nip_petugas' => $beritaAcara->nip_petugas,
                'nip_ketua_rm' => $beritaAcara->nip_ketua_rm,
                'direktur' => $beritaAcara->direktur,
                'nip_direktur' => $beritaAcara->nip_direktur,
                'no_surat' => $beritaAcara->no_surat,
                'jumlah_rm' => $beritaAcara->jumlah_rm,
                'rentang_tahun' => $beritaAcara->rentang_tahun,
                'jabatan' => $beritaAcara->jabatan,
                'cara_pemusnahan' => $beritaAcara->cara_pemusnahan,
                'tanggal_pemusnahan' => $now_format,
                'waktu_pemusnahan' => $beritaAcara->waktu_pemusnahan,
                'lokasi_pemusnahan' => $beritaAcara->lokasi_pemusnahan,
                'ketua_rm' => $beritaAcara->ketua_rekam_medis,
            'lampiran' => 'Berita Acara Pemusnahan ' . $now_format . '.pdf'
            ])->setPaper('legal');
            $path = time() . '.pdf';
            file_put_contents(public_path('/berita_acara/' . $path), $dom_pdf->output());
            $pdf_merge->addPDF(public_path('/berita_acara/' . $path), 'all');


            // $oldPDFs = [$oldPDF];
            // dd($oldPDFs);
            // Merge file PDF lama dengan file PDF baru
            foreach ($dataLampiran as $file) {
                $pdf_merge->addPDF($file->path_file, 'all'); // Tambahkan file PDF lama
            }

            $filename = 'Berita Acara Pemusnahan'  . $now_format . '.pdf';
            $pdf_merge->merge();
            $pdf_merge->save(public_path('/berita_acara/' . $filename));
            $beritaAcara->lampiran = $filename;
            $beritaAcara->save();

            return redirect()->back()->with('success', 'Lampiran berhasil dihapus');
        } catch (\Throwable $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
    public function download($file)
    {
        try {
            return response()->download(public_path('/berita_acara/' . $file));
        } catch (\Throwable $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    // public function show($id)
    // {
    //     try {
    //         $beritaAcara = BeritaAcara::findOrFail($id);
    //         $pdf_merge = PDFMerger::init();
    //             $tanggal = $beritaAcara->tanggal_pemusnahan;
    //             $carbonTanggal = Carbon::parse($tanggal);
    //             $formatTanggal = $carbonTanggal->format('d, F, Y');
    //             $now = Carbon::now();
    //             $now_format = $now->format('d, F, Y');
    //             $namaBulanIndonesia = [
    //                 'January' => 'Januari',
    //                 'February' => 'Februari',
    //                 'March' => 'Maret',
    //                 'April' => 'April',
    //                 'May' => 'Mei',
    //                 'June' => 'Juni',
    //                 'July' => 'Juli',
    //                 'August' => 'Agustus',
    //                 'September' => 'September',
    //                 'October' => 'Oktober',
    //                 'November' => 'November',
    //                 'December' => 'Desember',
    //             ];

    //             foreach ($namaBulanIndonesia as $bulanInggris => $bulanIndonesia) {
    //                 $now_format = str_replace($bulanInggris, $bulanIndonesia, $now_format);
    //             }
    //             foreach ($namaBulanIndonesia as $bulanInggris => $bulanIndonesia) {
    //                 $formatTanggal = str_replace($bulanInggris, $bulanIndonesia, $formatTanggal);
    //             }
    //         $dom_pdf = PDF::loadview('petugas.berita-acara.print', [
    //             'tahun' => $now->year,
    //             'formatTanggal' => $now_format,
    //             'nama_petugas' => $beritaAcara->name,
    //             'jabatan' => $beritaAcara->jabatan,
    //             'cara_pemusnahan' => $beritaAcara->cara_pemusnahan,
    //             'tanggal_pemusnahan' => $formatTanggal,
    //             'waktu_pemusnahan' => $beritaAcara->waktu_pemusnahan,
    //             'lokasi_pemusnahan' => $beritaAcara->lokasi_pemusnahan,
    //             'ketua_rm' => $beritaAcara->ketua_rm,
    //             'lampiran' => 'Berita Acara Pemusnahan ' . $formatTanggal . '.pdf'
    //         ])->setPaper('legal');
    //         return $dom_pdf->stream('data-retensi', array("Attachment" => false));

    //     } catch (\Throwable $e) {
    //         return redirect()->back()->withError($e->getMessage());
    //     } catch (\Illuminate\Database\QueryException $e) {
    //         return redirect()->back()->withError($e->getMessage());
    //     }
    // }
}
