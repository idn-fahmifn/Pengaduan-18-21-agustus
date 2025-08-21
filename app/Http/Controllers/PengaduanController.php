<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PengaduanController extends Controller
{
    public function create()
    {
        return view('user.pengaduan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_pengaduan' => ['string', 'required', 'min:3', 'max:50'],
            'deskripsi_pengaduan' => ['required'],
            'dokumentasi' => ['required', 'file', 'mimes:jpg,jpeg,png,webp,heic', 'max:10240']
        ]);
        $simpan = [
            'judul_pengaduan' => $request->input('judul_pengaduan'),
            'deskripsi_pengaduan' => $request->input('deskripsi_pengaduan'),
            'user_id' => Auth::user()->id
        ];
        // kondisi untuk gambar
        if($request->hasFile('dokumentasi'))
        {
            $gambar = $request->file('dokumentasi');
            $path = 'public/images/pengaduan';
            $ext = Str::lower($gambar->getClientOriginalExtension()); 
            $nama = 'gambar_laporan_'.Carbon::now('Asia/Jakarta')->format('Ymdhis').random_int(0000,9999).'.'.$ext;

            $gambar->storeAs($path, $nama);

            // gambar_laporan_tanggalangka.ext
            $simpan['dokumentasi'] = $nama; //nama yang akan disimpan di database
        }

        Pengaduan::create($simpan);
        return redirect()->route('dashboard.user')->with('success', 'Laporan berhasil dibuat');

    }

    public function detail($id)
    {
        $data = Pengaduan::where('id', $id)->first();

        if($data){
            $data = Pengaduan::find($id);
        }else{
            return redirect()->route('dashboard.user');
        }
        return view('user.pengaduan.detail', compact('data'));
    }
}
