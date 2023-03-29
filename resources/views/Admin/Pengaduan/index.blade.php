@extends('layouts.admin')

@section('title', 'Admin PEKAT || Pengaduan')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection

@section('header', 'Data Pengaduan')

@section('content')
    <table id="pengaduanTable" class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Isi Laporan</th>
                <th>Status</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengaduan as $k => $v)
            <tr>
                <td>{{ $k += 1 }}</td>
                <td>{{ $v->tgl_pengaduan->format('d-M-Y') }}</td>
                <td>{{ $v->isi_laporan }}</td>
                <td>
                    @if ($v->status == '0')
                        <a href="" class="badge badge-danger">Pending</a>
                    @elseif($v->status == 'proses')
                        <a href="" class="badge badge-warning text-white">Proses</a>
                    @else
                        <a href="" class="badge badge-success">Selesai</a>
                    @endif
                </td>
                <?php if($v->approve == '0'){?>
                    <td class="d-flex">
                        <form action="{{ route('approve-update') }}" method="POST">
                            @csrf
                            @method('get')

                            <input type="text" name="approve" style="display:none" value="terima">
                            <input type="text" name="id" style="display:none" value="{{ $v->id_pengaduan }}">
                            <button type="submit" class="btn btn-primary">Terima</button>
                        </form>
                        <form action="{{ route('approve-update') }}" method="POST" style="margin-left:10px;">
                            @csrf
                            @method('get')

                            <input type="text" name="approve" style="display:none" value="ditolak">
                            <input type="text" name="id" style="display:none" value="{{ $v->id_pengaduan }}">
                            <button type="submit" class="btn btn-danger">Tolak</button>
                        </form>
                    </div>			
                   
                <?php }else{?>
                    <td><a href="{{ route('pengaduan.show', $v->id_pengaduan) }}" class="btn btn-primary">Tanggapi</a></td>
                <?php } ?>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#pengaduanTable').DataTable();
        } );
    </script>
@endsection