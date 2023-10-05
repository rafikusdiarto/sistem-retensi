<?php

namespace App\Http\Controllers\Kepala;

use PDF;
use Carbon\Carbon;
use App\Models\BeritaAcara;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;

class BeritaAcaraKepalaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:kepala']);
    }

    public function index()
    {
        try {
            $data = BeritaAcara::all();
            return view('kepala.berita-acara.index', [
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
            return view('kepala.berita-acara.create', [
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
        $request->validate([
            'name' => 'required',
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
                $dom_pdf = PDF::loadview('kepala.berita-acara.print', [
                    'tahun' => $now->year,
                    'formatTanggal' => $now_format,
                    'nama_petugas' => $request->name,
                    'jabatan' => $request->jabatan,
                    'cara_pemusnahan' => $request->cara_pemusnahan,
                    'tanggal_pemusnahan' => $formatTanggal,
                    'waktu_pemusnahan' => $request->waktu_pemusnahan,
                    'lokasi_pemusnahan' => $request->lokasi_pemusnahan,
                    'ketua_rm' => $request->ketua_rekam_medis,
                    'lampiran' => 'Berita Acara Pemusnahan ' . $formatTanggal . '.pdf'
                ])->setPaper('legal');
                $path = time() . '.pdf';
                file_put_contents(public_path('/berita_acara/' . $path), $dom_pdf->output());
                $pdf_merge->addPDF(public_path('/berita_acara/' . $path), 'all');

                $files = $request->file('lampiran');
                foreach ($files as $key => $value) {
                    $pdf_merge->addPDF($value->getPathName(), 'all');
                }
                $filename = 'Berita Acara Pemusnahan ' . $formatTanggal . '.pdf';
                $pdf_merge->merge();
                $pdf_merge->save(public_path('/berita_acara/' . $filename));

                BeritaAcara::create([
                    'user_id' => \Auth::user()->id,
                    'cara_pemusnahan' => $request->cara_pemusnahan,
                    'tanggal_pemusnahan' => $request->tanggal_pemusnahan,
                    'waktu_pemusnahan' => $request->waktu_pemusnahan,
                    'lokasi_pemusnahan' => $request->lokasi_pemusnahan,
                    'ketua_rm' => $request->ketua_rekam_medis,
                    'lampiran' => $filename
                ]);

            }

            return redirect('/kepala/berita-acara')->with('success', 'Data berhasil ditambahkan');
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
            return view('kepala.berita-acara.edit', [
                'data' => $data
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
            'jabatan' => 'required',
            'cara_pemusnahan' => 'required',
            'tanggal_pemusnahan' => 'required',
            'waktu_pemusnahan' => 'required',
            'lokasi_pemusnahan' => 'required',
            'ketua_rm' => 'required',
            'lampiran' => 'required',
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
                $dom_pdf = PDF::loadview('kepala.berita-acara.print', [
                    'tahun' => $now->year,
                    'formatTanggal' => $now_format,
                    'nama_petugas' => $request->name,
                    'jabatan' => $request->jabatan,
                    'cara_pemusnahan' => $request->cara_pemusnahan,
                    'tanggal_pemusnahan' => $formatTanggal,
                    'waktu_pemusnahan' => $request->waktu_pemusnahan,
                    'lokasi_pemusnahan' => $request->lokasi_pemusnahan,
                    'ketua_rm' => $request->ketua_rm,
                    'lampiran' => 'Berita Acara Pemusnahan ' . $formatTanggal . '.pdf'
                ])->setPaper('legal');
                $path = time() . '.pdf';
                file_put_contents(public_path('/berita_acara/' . $path), $dom_pdf->output());
                $pdf_merge->addPDF(public_path('/berita_acara/' . $path), 'all');

                $files = $request->file('lampiran');
                foreach ($files as $key => $value) {
                    $pdf_merge->addPDF($value->getPathName(), 'all');
                }
                $filename = time() . '.pdf';
                $pdf_merge->merge();
                $pdf_merge->save(public_path('/berita_acara/' . $filename));

                BeritaAcara::find($id)->update([
                    'user_id' => \Auth::user()->id,
                    'cara_pemusnahan' => $request->cara_pemusnahan,
                    'tanggal_pemusnahan' => $request->tanggal_pemusnahan,
                    'waktu_pemusnahan' => $request->waktu_pemusnahan,
                    'lokasi_pemusnahan' => $request->lokasi_pemusnahan,
                    'ketua_rm' => $request->ketua_rm,
                    'lampiran' => $filename
                ]);
            }

            return redirect('/kepala/berita-acara')->with('success', 'Data berhasil diubah');
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
            return redirect('/kepala/berita-acara')->with('success', 'Data berhasil dihapus');
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
}
