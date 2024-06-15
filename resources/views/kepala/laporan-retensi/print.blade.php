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
        <div>
            <center style="margin-left: 2cm; margin-right: 2cm;">
                <h2>LAPORAN RETENSI REKAM MEDIS</h2>
            </center>
        </div>
    </div>
    <div>
        <table style="width: 100%;border: 1px solid black;border-collapse: collapse;">
            <thead style="background-color: #72B854;">
                <tr>
                    <th style="padding: 2px;border: 1px solid black;border-collapse: collapse">No</th>
                    <th style="padding: 2px;border: 1px solid black;border-collapse: collapse">Kode RM</th>
                    <th style="padding: 2px;border: 1px solid black;border-collapse: collapse">NIK</th>
                    <th style="padding: 2px;border: 1px solid black;border-collapse: collapse">Nama</th>
                    <th style="padding: 2px;border: 1px solid black;border-collapse: collapse">Jenis Kelamin</th>
                    <th style="padding: 2px;border: 1px solid black;border-collapse: collapse">MRS</th>
                    <th style="padding: 2px;border: 1px solid black;border-collapse: collapse">KRS</th>
                    <th style="padding: 2px;border: 1px solid black;border-collapse: collapse">Tanggal Upload</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pasien as $item)
                <tr>
                    <td style="padding: 2px;border: 1px solid black;border-collapse: collapse"><center>{{$loop->iteration}}</center></td>
                    <td style="padding: 2px;border: 1px solid black;border-collapse: collapse">{{$item->no_rm}}</td>
                    <td style="padding: 2px;border: 1px solid black;border-collapse: collapse">{{$item->nik}}</td>
                    <td style="padding: 2px;border: 1px solid black;border-collapse: collapse">{{$item->nama}}</td>
                    <td style="padding: 2px;border: 1px solid black;border-collapse: collapse">{{$item->jenis_kelamin}}</td>
                    <td style="padding: 2px;border: 1px solid black;border-collapse: collapse">{{$item->mrs}}</td>
                    <td style="padding: 2px;border: 1px solid black;border-collapse: collapse">{{$item->krs}}</td>
                    <td style="padding: 2px;border: 1px solid black;border-collapse: collapse">{{\Carbon\Carbon::parse($item->created_at)->format('Y-m-d')}}</td>
                </tr>
                @endforeach
                <tr>
                    <th colspan="7" style="padding: 2px;border: 1px solid black;border-collapse: collapse">TOTAL</th>
                    <th style="padding: 2px;border: 1px solid black;border-collapse: collapse">{{$total}}</th>
                </tr>
            </tbody>
        </table>
        </table>
    </div>
</body>
</html>
