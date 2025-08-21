<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
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
}
