<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Respon;
use Illuminate\Http\Request;

class ResponController extends Controller
{
    public function detail($id)
    {
        $data = Pengaduan::where('id', $id)->first();

        if($data){
            $data = Pengaduan::find($id);
        }else{
            return redirect()->route('dashboard');
        }
        return view('admin.pengaduan.detail', compact('data'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'deskripsi_tanggapan' => ['required'],
            'status' => ['required'],
        ]);

        Respon::create([
            'deskripsi_tanggapan' => $request->input('deskripsi_tanggapan'),
            'pengaduan_id' => $id
        ]);

        // mengubah status
        $data_status = Pengaduan::find($id);
        $data_status->status = $request->input('status');
        $data_status->save();

        return back()->with('success', 'Respon berhasil ditambahkan');

    }
}
