<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\Petugas;
use App\Models\Tanggapan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $petugas = Petugas::all()->count();

        $masyarakat = Masyarakat::all()->count();

        $pending = Pengaduan::where('status', '0')->get()->count();

        $proses = Pengaduan::where('status', 'proses')->get()->count();

        $selesai = Pengaduan::where('status', 'selesai')->get()->count();

        $tanggapan = Tanggapan::all()->count();

        return view('Admin.Dashboard.index', ['petugas' => $petugas, 'masyarakat' => $masyarakat, 'pending' => $pending,  'proses' => $proses, 'selesai' => $selesai, 'tanggapan' => $tanggapan]);
    }
}
