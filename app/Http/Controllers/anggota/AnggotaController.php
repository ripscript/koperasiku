<?php

namespace App\Http\Controllers\anggota;

use Exception;
use App\models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class AnggotaController extends Controller
{
    public function index ()
    {
        $anggota = Anggota::all();
        return view('anggota.index', compact('anggota'));
    }

    public function create ()
    {
        return view('anggota.create');
    }

    public function store (Request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'namaLengkap' => ['required'],
            'tempat' => ['required'],
            'tanggalLahir' => ['required'],
            'pekerjaan' => ['required'],
            'simpananPokok' => ['required'],
            'alamat' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
        }

        $simpananPokok = str_replace([','], '', filter_var($request['simpananPokok'], FILTER_SANITIZE_NUMBER_INT));

        try {
            DB::table('anggota')
            ->insert([
                'nama' => $request->namaLengkap,
                'tempat' => $request->tempat,
                'tanggal_lahir' => $request->tanggalLahir,
                'pekerjaan' => $request->pekerjaan,
                'alamat' => $request->alamat,
                'simpanan_pokok' => $simpananPokok,
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            Alert::success('Anggota berhasil ditambahkan');
            return redirect()->route('anggota.daftar-anggota');
        } catch (Exception $th) {
            //throw $th;
            Alert::warning('Oops', 'Ada yang salah nih, coba hubungi admin');
            return redirect()->back()->withInput();
        }
    }

}
