<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            font-family: sans-serif;
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
                <img src="{{public_path('assets/img/logo_jember.png')}}" style="width: 2.5cm; height:3cm" alt="">
            </th>
            <th>
                <div style="font-weight:normal; display: flex; justify-content: center">
                    <center><p>
                        <h4 style="margin-bottom:-2px;">RUMAH SAKIT TINGKAT III BALADHIKA HUSADA JEMBER</h4>
                        <br>
                        <p style="font-size: 9px">Jalan Panglima Besar Sudirman No.45, Pagah, Jemberlor, Kec. Patrang, Kabupaten Jember, Jawa Timur, 68118</p>
                    </p></center>
                    <br><br>
                </div>
            </th>
            <th>
                <img src="{{ public_path('assets/img/logo-dkt-1.jpg') }}" style="width: 2.5cm; height:3cm;" alt="">
            </th>
        </tr>
    </table>
    <hr style="background-color:black; border:none; height:2px;text-transform:uppercase">
    <div>
        <center style="margin-left: 2cm; margin-right: 2cm;">
            <h2>BERITA ACARA PEMUSNAHAN REKAM MEDIS TAHUN {{ $tahun }}</h2>
        </center>
    </div>
    <div>
        <p style="float: right">Jember, {{ $formatTanggal }}</p>
        <p style="margin-top: 1.5cm">Sehubungan dengan surat keputusan Rumah Sakit Tingkat III Baladhika Husada Jember No 12234 dengan ini menenrangkan terkebih  dahulu:    </p>
        <p style="float: left; height: 1cm">1.</p>
        <p style="margin-left: 1cm">Bahwa dalam rangka pemusanahan dokumen rekam medis Rumah Sakit Tingkat III Baladhika Husada Jember telah dibentuk tim pemusnahan yang mempunyai tugas untuk  melaksanakan pemusnahan rekam medis sebagaimana petunjuk  ddan ketentuan yang berlaku. </p>
        <p style="float: left; height: 1cm">2.</p>
        <p style="margin-left: 1cm">Bahwa pelaksanaan pemusnahan berdasarkan ........... dan mengacu.............. pada peraturan............ dan keputusan .....</p>
        <p>Atas dasar tersebut tim pemusnah rekam medis Rumah Sakit Tingkat III Baladhika Husada Jember telah melakukan pemusnahan rekam medis inaktif tahun ...... - .......... </p>
        <p>Nama Petugas<span style="margin-left: 4cm">: {{ $nama_petugas }}</span></p>
        <p style="text-transform: capitalize;">Jabatan <span style="margin-left: 5.2cm">: {{ $jabatan }}</span></p>
        <p>Cara Pemusnahan <span style="margin-left: 3.2cm">: {{ $cara_pemusnahan }}</span></p>
        <p>Tanggal Pemusnahan <span style="margin-left: 2.6cm">: {{ $tanggal_pemusnahan }}</span></p>
        <p>Waktu Pemusnahan <span style="margin-left: 2.92cm">: {{ $waktu_pemusnahan }} WIB</span></p>
        <p>Lokasi Pemusnahan <span style="margin-left: 2.9cm">: {{ $lokasi_pemusnahan }}</span></p>
        <p>Ketua Rekam Medis <span style="margin-left: 2.92cm">: {{ $ketua_rm }}</span></p>
        <p>Lampiran <span style="margin-left: 4.98cm">: {{ $lampiran }}</span></p>
    </div>
    <div style="float: right; margin-top: 3cm; width: 7cm">
        <p>Mengetahui,</p>
        <p>Kepala Rekam Medis</p>

        <p style="margin-top: 2.5cm">Nama</p>
        <hr style="background-color:black; border:none; height:2px;text-transform:uppercase;margin-top: -.3cm">
        <p style="margin-top: -.1cm">NIP.</p>
    </div>
</body>
</html>
