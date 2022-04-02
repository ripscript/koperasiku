<?php

namespace App\Http\Controllers\admin\admin;

use Exception;
use App\models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function daftarAdmin ()
    {
        // get daftar admin
        $daftarAdmin = Users::all();
        return view('admin.admin.daftarAdmin', compact('daftarAdmin'));
    }

    public function tambahAdmin ()
    {
        return view('admin.admin.tambahAdmin');
    }

    public function store (Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $passwordRequest = md5($request['password']);
        DB::beginTransaction();
        try {
            DB::table('users')->insert([
                'nama' => $request['namaLengkap'],
                'alamat' => $request['alamat'],
                'email' => $request['email'],
                'password' => $passwordRequest,
            ]);

            DB::commit();

            Alert::success('User berhasil ditambahkan');
            return redirect()->route('admin.daftar-admin');
        } catch (Exception $th) {
            //throw $th;
            // dd($th);
            DB::rollback();
            Alert::error('Oops', 'Ada yang error nih, coba tanya admin');
            return redirect()->back()->withInput();
        }
    }

    public function edit ($id)
    {
        $admin = Users::where('id', $id)
        ->first();
        return view('admin.admin.editAdmin', compact('admin'));
    }

    public function update (Request $request, $id)
    {
        $admin = Users::where('id', $id)
        ->first();
        $passwordRequest = md5($request['password']);
        try {
            if ($request['password']) {
                DB::table('users')
                ->where('id', $id)
                ->update([
                    'nama' => $request['namaLengkap'],
                    'alamat' => $request['alamat'],
                    'email' => $request['email'],
                    'password' => $passwordRequest
                ]);
            } else {
                DB::table('users')
                ->where('id', $id)
                ->update([
                    'nama' => $request['namaLengkap'],
                    'alamat' => $request['alamat'],
                    'email' => $request['email'],
                    'password' => $admin->password
                ]);
            }

            
            Alert::success('Data berhasil di update');
            return redirect()->route('admin.daftar-admin');
        } catch (Exception $th) {
            //throw $th;
            Alert::error('Oops', 'Ada yang salah, coba tanya admin');
            return redirect()->back();
        }
    }

    public function delete ($id)
    {
        try {
            DB::table('users')
            ->where('id', $id)
            ->delete();

            Alert::success('Data admin berhasil dihapus');
            return redirect()->back();
        } catch (Exception $th) {
            //throw $th;
            Alert::error('Oops', 'Ada yang salah coba tanya admin');
            return redirect()->back();
        }
    }
}
