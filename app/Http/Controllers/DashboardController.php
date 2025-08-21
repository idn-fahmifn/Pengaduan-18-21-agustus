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
        $data = Pengaduan::where('user_id', Auth::user()->id)
        ->get();
        return view('user.dashboard', [
            'data' => $data
        ]);
    }
}
