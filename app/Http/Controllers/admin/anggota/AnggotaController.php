<?php

namespace App\Http\Controllers\admin\anggota;
use Exception;
use App\models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

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

    public function store(Request $request)
    {
        // dd($request->all());
        // dd($request['namaLengkap']);
        try {
            DB::table('anggota')->insert([
                'nama'=>$request['namaLengkap'],
                'ttl'=>$request['ttl'],
                'pekerjaan'=>$request['pekerjaan'],
                'alamat'=>$request['alamat'],
                'simpanan_pokok'=>$request['simpanan_pokok']
            ]);
            return redirect()->route('anggota.daftar-anggota');
        } catch (Exception $th) {
            //throw $th;
        }
    }

    public function delete($id)
    {
        try {
            DB::table('anggota')->where('id',$id)->delete();
            return redirect()->back(); 
        } catch (Exception $th) {
            //throw $th;
            Alert::error('Ops!!! Hapus Gagal');
            return redirect()->back();
        }
    }


}
