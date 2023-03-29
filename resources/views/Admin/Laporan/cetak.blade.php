<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Laporan Pengaduan</title>
</head>
<body >


    <div class="text-center">

    <table class="table"  border="1">
        <tr>
            <th><img src="asset/images/masyarakat.png"></th>
            <th>APLIKASI PENGADUAN MASYARAKAT KAMPUNG BAKOM SARI</th>
        </tr>
    </table>
        <h5>Laporan Pengaduan Masyarakat</h5>
        <h6>Periode: {{ date('d-m-y') }}</h6>
    </div>
    <div class="container" style="margin-right: 200px">
        <table class="table" border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Isi Laporan</th>
                    <th>Tanggapan</th>
                    <th>TGL Tanggapan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody style="width:2000px">
                @foreach ($pengaduan as $k => $v)
                    <tr>
                        <td>{{ $k += 1 }}</td>
                        <td>{{ $v->nik }}</td>
                        <td>{{ $v->nama }}</td>
                        <td>{{ $v->tgl_pengaduan }}</td>
                        <td>{{ $v->isi_laporan }}</td>
                        @foreach ($tanggapan as $p)
                        <td>{{ $p->tanggapan}}</td> 
                        <td>{{ $p->tgl_tanggapan }}</td> 
                        @endforeach
                        <td>{{ $v->status == '0' ? 'Pending' : ucwords($v->status) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>