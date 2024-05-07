<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            font-family: 'Times New Roman', Times, serif;
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
        <div>
            <center style="margin-left: 2cm; margin-right: 2cm;">
                <h2 style="text-decoration: underline">LAPORAN REKAM MEDIS AKTIF</h2>
            </center>
            <p style="line-height: 1.5;text-align: justify;">
                Berikut adalah laporan jumlah  berkas rekam medis yang masih aktif di Rumah Sakit Tingkat III Baladhika  Husada Jember.
            </p>
        </div>
    </div>
    <div>
        <table style="width: 100%;border: 1px solid black;border-collapse: collapse;">
            <thead style="background-color: #72B854;">
                <tr>
                    <th style="padding: 2px;border: 1px solid black;border-collapse: collapse">No</th>
                    <th style="padding: 2px;border: 1px solid black;border-collapse: collapse">RENTANG TAHUN</th>
                    <th style="padding: 2px;border: 1px solid black;border-collapse: collapse">JUMLAH BERKAS</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($pasien as $item) --}}
                @php
                    $no = 1
                @endphp
                <tr>
                    <td style="padding: 2px;border: 1px solid black;border-collapse: collapse"><center>{{$no++}}</center></td>
                    <td style="padding: 2px;border: 1px solid black;border-collapse: collapse">{{$tahun}}</td>
                    <td style="padding: 2px;border: 1px solid black;border-collapse: collapse">{{$total}}</td>
                </tr>
                {{-- @endforeach --}}
            </tbody>
        </table>
        </table>
    </div>
    <div style="float: right; margin-top: 3cm; width: 7cm">
        <p style="margin-left:30px">Jember, {{ Carbon\Carbon::now()->locale('id')->translatedFormat('d F Y') }}</p>
        <p style="margin-left: 30px;margin-top:-8px">Mengetahui,</p>
        <p style="margin-left:-26px;margin-top:-8px">Kepala Instalasi Rekam Medis</p>

        <div style="margin-top: -15px">
            <p style="margin-top: 2.5cm;text-decoration:underline;margin-left:20px">Rika Furi R,S,ST</p>
            <p style="margin-top:-12px">NIS. 05.06.02.91.14.150</p>

        </div>
    </div>
</body>
</html>
