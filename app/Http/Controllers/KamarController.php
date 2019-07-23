<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Kamar;

class KamarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $page_title = 'Data Kamar';
        $kamar = Kamar::paginate(5);

        return view('kamar.view', [
            'page_title' => $page_title,
            'kamar' => $kamar,
        ]);
    }

    public function add_kamar() {
        $page_title = 'Tambah Kamar';

        return view('kamar.add', [
            'page_title' => $page_title,
        ]);
    }

    public function process(Request $request, $kamar_kode = null) {
        $this->validate($request, [
            'kamar_kode' => 'required',
            'kamar_nama' => 'required',
            'kamar_desk' => 'required',
            'kamar_ketersediaan' => 'required',
            'kamar_harga' => 'required',
        ]);

        if ($request->simpan == 'simpan' && $kamar_kode == null) {
            $data = $request->all();
            Kamar::create($data);
            return redirect()->back()->with(['status' => 'Kamar Berhasil ditambahkan']);
        } else {
            $kamar = Kamar::where(['kamar_kode' => $request->kamar_kode])->first();
            $kamar->kamar_nama = $request->kamar_nama;
            $kamar->kamar_desk = $request->kamar_desk;
            $kamar->kamar_ketersediaan = $request->kamar_ketersediaan;
            $kamar->kamar_harga = $request->kamar_harga;
            $kamar->save();

            return redirect()->route('kamar')->with(['status' => 'Kamar dengan kode '.$kamar_kode.' berhasil diupdate!!!']);
        }
    }

    public function delete_kamar($kamar_kode) {
        try {
            $kamar = Kamar::where('kamar_kode', $kamar_kode)->first();
        } catch (ModelNotFoundException $exception) {
            return redirect()->back()->with(['status' => 'Gagal Hapus : '.$exception]);
        }
        $kamar->delete();
        return redirect()->back()->with(['status' => 'Berhasil Hapus '.$kamar_kode]);
    }

    public function edit_kamar($kamar_kode) {
        $page_title = 'Edit Kamar '.$kamar_kode;

        try {
            $kamar = Kamar::where('kamar_kode', $kamar_kode)->first();
        } catch (ModelNotFoundException $exception) {
            return redirect()->back()->with(['status' => 'Gagal Edit : '.$exception]);
        }

        return view('kamar.edit', [
            'page_title' => $page_title,
            'kamar' => $kamar
        ]);
    }
}
