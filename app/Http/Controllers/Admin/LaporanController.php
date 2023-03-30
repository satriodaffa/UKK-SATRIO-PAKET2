<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    public function index()
    {
        return view('Admin.Laporan.index');
    }

    public function getLaporan(Request $request)
    {
        $from = $request->from . ' ' . '00:00:00';
        $to = $request->to . ' ' . '23:59:59';

        $pengaduan = Pengaduan::whereBetween('tgl_pengaduan', [$from, $to])->get();
        $tanggapan = Tanggapan::whereBetween('tgl_tanggapan', [$from, $to])->get();

        return view('Admin.Laporan.index', ['pengaduan' => $pengaduan, 'from' => $from, 'to' => $to], ['tanggapan' => $tanggapan, 'from' => $from, 'to' => $to]);
    }

    public function cetakLaporan($from, $to)
    {
        $pengaduan = Pengaduan::whereBetween('tgl_pengaduan', [$from, $to])->get();
        $tanggapan = Tanggapan::whereBetween('tgl_tanggapan', [$from, $to])->get();

        $pdf = PDF::loadView('Admin.Laporan.cetak', ['pengaduan' => $pengaduan, 'from' => $from, 'to' => $to], ['tanggapan' => $tanggapan, 'from' => $from, 'to' => $to]);
        return $pdf->download('laporan-pengaduan.pdf');
    }
}
