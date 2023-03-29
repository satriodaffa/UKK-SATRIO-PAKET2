@extends('layouts.admin')

@section('title', 'Admin PEKAT || Laporan')
    
@section('header', 'Laporan Pengaduan')
    
@section('content')
   

                <div class="card-header">
                    Cari Berdasarkan Tanggal
                </div>
                
                    <form action="{{ route('laporan.getLaporan') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="from" class="form-control" placeholder="Tanggal Awal" onfocusin="(this.type='date')" onfocusout="(this.type='text')">
                        </div>
                        <div class="form-group">
                            <input type="text" name="to" class="form-control" placeholder="Tanggal Akhir" onfocusin="(this.type='date')" onfocusout="(this.type='text')">
                        </div>
                        <button type="submit" class="btn btn-purple" style="width: 100%">Cari Laporan</button>
                    </form>
                </div>
        
            </div>
                <div class="card-header">
                    Data Berdasarkan Tanggal
                    <div class="float-right">
                        @if ($pengaduan ?? '')
                            <a href="{{ route('laporan.cetakLaporan', ['from' => $from, 'to' => $to]) }}" class="btn btn-danger">EXPORT PDF</a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    @if ($pengaduan ?? '')
                        <table class="table">
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
                            <tbody>
                                @foreach ($pengaduan as $k => $v)
                                    <tr>
                                        <td>{{ $k += 1 }}</td>
                                        <td>{{ $v->nik }}</td>
                                        <td>{{ $v->nama }}</td>
                                        <td>{{ $v->tgl_pengaduan }}</td>
                                        <td>{{ $v->isi_laporan }}</td>
                                        @foreach($tanggapan as $p)
                                        <td>{{ $p->tanggapan}}</td>  
                                        <td>{{ $p->tgl_tanggapan }}</td>  
                                        @endforeach
                                        <td>
                                            @if ($v->status == '0')
                                                <a href="" class="badge badge-danger">Pending</a>
                                            @elseif($v->status == 'proses')
                                                <a href="" class="badge badge-warning text-white">Proses</a>
                                            @else
                                                <a href="" class="badge badge-success">Selesai</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="text-center">
                            Tidak ada data
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection