<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // admin dashboard
    public function admin()
    {
        return view('admin.dashboard');
    }

    public function user()
    {
        $data = Pengaduan::where('user_id', Auth::user()->id)->get();

        // counter
        $pengaduan_saya = Pengaduan::where('user_id', Auth::user()->id)->count();
        $selesai = Pengaduan::where('user_id', Auth::user()->id)->where('status', 'selesai')->count();
        $diproses = Pengaduan::where('user_id', Auth::user()->id)->where('status', 'diproses')->count();
        $ditolak = Pengaduan::where('user_id', Auth::user()->id)->where('status', 'ditolak')->count();

        return view('user.dashboard', [
            'data' => $data,
            'pengaduan_saya' => $pengaduan_saya,
            'diproses' => $diproses,
            'selesai' => $selesai,
            'ditolak' => $ditolak,
        ]);
    }
}
