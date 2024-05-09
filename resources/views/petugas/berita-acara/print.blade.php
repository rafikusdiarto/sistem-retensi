<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            font-family:'Times New Roman', Times, serif;
        }
        /* table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        } */
    </style>
</head>
<body>
    <table class="myTable" style="width: 100%; margin-top:-30px;margin-bottom:-5px;
    ">
        <tr>
            <th>
                <img src="{{public_path('assets/img/logo_jember.png')}}" style="width: 2.7cm; height:3.3cm" alt="">
            </th>
            <th>
                <div style="font-weight:normal">
                    <center><p>
                        <h2 style="font-weight:lighter;margin-bottom:-17px">PEMERINTAH KABUPATEN JEMBER</h2>
                        <h4 style="margin-bottom:-2px;">RUMAH SAKIT TINGKAT III BALADHIKA <br> HUSADA JEMBER</h4>
                        &nbsp;
                        Jalan Panglima Besar Sudirman No.45, Pagah, Jemberlor <br>
                        Telepon: (0331)484674 <br>
                        <p style="font-size:14px;margin-top:-1px">
                            Website: rsbaladhikahusada.com Email:rsbaladhikahusadajember@gmail.com
                        </p>
                        <h4 style="font-weight:lighter;margin-top:-9px">
                            JEMBER
                        </h4>
                        <p style="margin-left:350px;margin-top:-18px" >
                            Kode Pos: 68118
                        </p>
                    </p></center>

                    <br><br>
                </div>
            </th>
            <th>
                <img src="{{ public_path('assets/img/logo-dkt-1.jpg') }}" style="width: 3.5cm; height:4cm;" alt="">
            </th>
        </tr>
    </table>
    <hr style="background-color:black; border:none; height:2px;text-transform:uppercase;margin-top:-40px">
    <div>
        <center style="margin-left: 2cm; margin-right: 2cm;">
            <h3 style="text-decoration:underline">BERITA ACARA PEMUSNAHAN BERKAS REKAM MEDIS</h3>
            <p style="margin-top: -15px">Nomor: {{$no_surat}}</p>
        </center>
    </div>
    <div style="text-align: justify">
        <p style="margin-top: 30px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sehubungan dengan keputusan kepala rekam medis Rumah Sakit Tingkat IIB Baladhika Husada Jember, dengan ini menerangkan terlebih dahulu:    </p>
        <div style="margin-left: 40px;margin-top:-15px">
            <p style="float: left; height: 1cm">1.</p>
            <p style="margin-left: 1cm">Bahwa dalam rangka pemusnahan berksa rekam medis telah dibentuk tim pemuanahan rekam medis yang mempunyai tugas suntuk melaksanakan pemusnahan rekam medis sebagaimana petunjuk dan ketentuak yang berlaku.</p>
            <p style="float: left; height: 1cm ;margin-top:-12px">2.</p>
            <p style="margin-left: 1cm;margin-top:-12px">Bahwa pelaksanaan pemusnahan tersebut berdasarkan dan mengacu pada peraturan Menteri kesehatan Nomor 269 Tahun 2008 Tentang rekam Medis; dan Keputusan Menteri Kesehatan Nomor 377 Tahun 2007 tentang Standar Profesi Perekam Medis dan Informasi Kesehatan</p>

        </div>

        <p style="margin-left: 40px">Atas dasar tersebut, Tim Pemusnahan Berkas Rekam Medis Rumah Sakit Tingkat III Baladhika Husada jember telah melakukan pemusnahan berkas rekam medis inaktif rentang {{$rentang_tahun}} tahun sebanyak {{$jumlah_rm}} berkas. - ...... </p>
        <div style="display: flex">
            <p style="margin-left: 40px">I. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PELAKSANAAN</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Petugas<span style="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $nama_petugas }}</span></p>
            <p style="text-transform: capitalize;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jabatan <span style="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $jabatan }}</span></p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cara Pemusnahan <span style="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $cara_pemusnahan }}</span></p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tanggal Pemusnahan <span style="margin-left:3px">&nbsp;: {{ $tanggal_pemusnahan }}</span></p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Waktu Pemusnahan <span style="">&nbsp;&nbsp;&nbsp;&nbsp;: {{ $waktu_pemusnahan }} WIB</span></p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lokasi Pemusnahan <span style="">&nbsp;&nbsp;&nbsp;&nbsp;: {{ $lokasi_pemusnahan }}</span></p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ketua Rekam Medis <span style="margin-left:2px">&nbsp;&nbsp;&nbsp;: {{ $ketua_rm }}</span></p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lampiran <span style="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $lampiran }}</span></p>
        </div>
        <div style="">
            <p style="margin-left: 40px">II. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; TATA CARA</p>
            <div style="text-align: justify;margin-left:103px">
                <p style="float: left; height: 1cm ;margin-top:-4px">1.</p>
                <p style="margin-left: 1cm;margin-top:-4px">Kepala Unit Rekam Medis menyiapkan berkas rekam medis yang akan dimusnahkan dan membentuk tim pemusnahan berkas rekam medis.</p>
                <p style="float: left; height: 1cm ;margin-top:-4px">2.</p>
                <p style="margin-left: 1cm;margin-top:-4px">Mencatat semua berkas rekam medis beserta kasus yang akan dimusnahkan.</p>
                <p style="float: left; height: 1cm ;margin-top:-4px;margin-left:-12px">3.</p>
                <p style="margin-left: 1cm;margin-top:-4px">Tim pemusnahan rekam medis melakukan pemilahan formulir berkas rekam medis pasien. Formulir resume medis, tindakan operasi, formulir kematian dan berkas terkait kasus hukum harus tetap disimpan.</p>
                <p style="float: left; height: 1cm ;margin-top:-4px">4.</p>
                <p style="margin-left: 1cm;margin-top:-4px">Pemusnahan dapat dilakukan dengan membakar, mencacah, atau menjadikan bubur.</p>
                <p style="float: left; height: 1cm ;margin-top:-4px;margin-left:-12px">5.</p>
                <p style="margin-left: 1cm;margin-top:-4px">Lakukan pemusnahan berkas rekam medis dan petugas rekam medis harus memastikan hancurnya berkas rekam medis sehingga tidak dapat dikenali isi maupun bentuknya.</p>
                <p style="float: left; height: 1cm ;margin-top:-4px">6.</p>
                <p style="margin-left: 1cm;margin-top:-4px">Setiap proses pemusnahan harus dilakukan dokumentasi dan dibuatkan berita acara pemusnahan berkas rekam medis.</p>
                <p style="float: left; height: 1cm ;margin-top:-4px;margin-left: -13px">7.</p>
                <p style="margin-left: 1cm;margin-top:-4px">Terakhir, dokumen pemusnahan berkas rekam medis disimpan selamanya di unit rekam medis.</p>
                <p style="float: left; height: 1cm ;margin-top:-4px;">8.</p>
                <p style="margin-left: 1cm;margin-top:-4px">Daftar rekam medis yang  dimusnahkan terlampir.</p>

            </div>

        </div>
    </div>
    <div style="float: left; margin-top:147px; width: 7cm;margin-left:-20px;text-align: center">
        <p>Ketua Tim Pemusnahan</p>

        <p style="margin-top: 3cm;">{{$nama_petugas}}</p>
        <p style="margin-top: 3cm;margin-top: -13px;">{{$nip_petugas}}</p>
    </div>
    <div style="float: right; margin-top: 3cm; width: 9cm;text-align: center">
        <p style="margin-left: 30px">Jember, {{ Carbon\Carbon::now()->locale('id')->translatedFormat('d F Y') }}</p>
        <p style="margin-left:-20px">Kepala Rekam Medis</p>

        <div style="">
            <p style="margin-top: 2.5cm;">{{$ketua_rm}}</p>
            <p style="margin-top: -13px;">{{$nip_ketua_rm}}</p>

        </div>
    </div>
    <div style="margin-top: 400px; width: 7cm;margin-left:300px;">
        <p style="">Mengetahui,</p>
        <p style="margin-left:-80px;margin-top: -13px;">Direktur RS TK III Bladhika Husada</p>

        <p style="margin-top: 2.5cm;margin-left:-40px">{{$direktur}}</p>
        <p style="margin-top: 2.5cm;margin-left:-37px;margin-top: -13px;">{{$nip_direktur}}</p>

    </div>
</body>
</html>
