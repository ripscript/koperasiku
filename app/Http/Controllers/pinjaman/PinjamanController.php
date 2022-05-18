<?php

namespace App\Http\Controllers\pinjaman;

use Exception;
use App\models\Anggota;
use App\models\Pinjaman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class PinjamanController extends Controller
{
    public function index ()
    {
        $pinjaman = Pinjaman::with('anggota')
        ->get();
        
        return view('pinjaman.index', compact('pinjaman'));
    }

    public function create ()
    {
        $anggota = Anggota::all();
        return view('pinjaman.create', compact('anggota'));
    }

    public function store (Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        $validator = Validator::make($request->all(), [
            'nama' => ['required'],
            'besarPinjaman' => ['required'],
            'bulan' => ['required', 'int'],
        ]);

        if ($validator->fails()) {
            return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
        }

        $nama = $request->nama;
        $bulan = $request->bulan;
        // bunga 1.5%
        $bunga = 0.015;
        $besarPinjaman = str_replace([','], '', filter_var($request['besarPinjaman'], FILTER_SANITIZE_NUMBER_INT));

        // pokok pinjaman perbulan
        $pokokPinjamanPerbulan = $besarPinjaman / $bulan;
        
        // bunga pertahun
        $bunganPertahun = $besarPinjaman * $bunga;
        // bunga perbulan
        $bunganPerbulan = $bunganPertahun / $bulan;
        
        // total cicilan perbulan
        $angsuranPerbulan = $pokokPinjamanPerbulan + $bunganPerbulan;

        try {
            // jika user telah mempunyai pinjaman
            $oldPinjaman = Pinjaman::where('nama', '=', $nama)
            ->with('anggota')
            ->first();

            if ($oldPinjaman == null) {
                $pinjaman = new Pinjaman;
                $pinjaman->nama = $nama;
                $pinjaman->besar_pinjaman = $besarPinjaman;
                $pinjaman->bunga = $bunga;
                $pinjaman->jumlah_bulan = $bulan;
                $pinjaman->angsuran_perbulan = $angsuranPerbulan;
                $pinjaman->created_at = date('Y-m-d H:i:s');
                if ($pinjaman->save()) {
                    Alert::success('Pinjaman berhasil ditambahkan');
                    return redirect()->route('pengajuan.daftar-peminjam');
                }
            } else {
                Alert::warning('Anggota dengan nama ' . $oldPinjaman->anggota->nama . ' masih mempunyai angsuran');
                return redirect()->back();
            }
        } catch (Exception $th) {
            //throw $th;
            Alert::error('Oops', 'Ada yang salah, coba tanya admin');
            return redirect()->back();
        }
        
    }

    public function printPengajuan ($id)
    {
        $pinjaman = Pinjaman::where('id', '=', $id)
        ->with('anggota')
        ->first();

        // return view('pinjaman.cetak', compact('pinjaman'));
        $pdf = \PDF::loadView('pinjaman.cetak', compact('pinjaman'));
        return $pdf->download('invoice.pdf');
    }
}
