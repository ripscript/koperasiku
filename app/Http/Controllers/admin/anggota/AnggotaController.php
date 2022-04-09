<?php

namespace App\Http\Controllers\admin\anggota;
use App\models\Anggota;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function daftarAnggota ()
    {
        // get daftar anggota
        $daftarAnggota = anggota::all();
        return view('admin.admin.daftarAnggota', compact('daftarAnggota'));
    }
    
    public function tambahAnggota ()
    {
        return view('admin.admin.tambahAnggota');
    }


}
