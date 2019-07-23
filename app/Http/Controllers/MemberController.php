<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class MemberController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index() {
        $page_title = 'Data Member';
        $member = Member::paginate(5);

        return view('member.view', [
            'page_title' => $page_title,
            'member' => $member,
        ]);
    }

    public function add_member() {
        $page_title = 'Tambah Member';

        return view('member.add', [
            'page_title' => $page_title,
        ]);
    }

    public function process(Request $request, $id = null) {
        $this->validate($request, [
            'member_nama' => 'required',
            'member_user' => 'required',
            'email' => 'required',
            'member_alamat' => 'required',
        ]);

        if ($request->simpan == 'simpan' && $id == null) {
            $data = $request->all();
            Member::create($data);
            return redirect()->back()->with(['status' => 'Member Berhasil ditambahkan']);
        } else {
            $member = Member::where(['id' => $request->id])->first();
            $member->member_nama = $request->member_nama;
            $member->member_user = $request->member_user;
            $member->email = $request->email;
            $member->member_alamat = $request->member_alamat;
            $member->save();

            return redirect()->route('member')->with(['status' => 'Member dengan username '.$request->member_user.' berhasil diupdate!!!']);
        }
    }

    public function delete_member($id) {
        try {
            $member = Member::where('id', $id)->first();
            $member_nama = $member->member_nama;
        } catch (ModelNotFoundException $exception) {
            return redirect()->back()->with(['status' => 'Gagal Hapus : '.$exception]);
        }
        $member->delete();
        return redirect()->back()->with(['status' => 'Berhasil Hapus '.$member_nama]);
    }

    public function edit_member($id) {
        try {
            $member = Member::where('id', $id)->first();
            $page_title = 'Edit Member '.$member->member_nama;
        } catch (ModelNotFoundException $exception) {
            return redirect()->back()->with(['status' => 'Gagal Edit : '.$exception]);
        }

        return view('member.edit', [
            'page_title' => $page_title,
            'member' => $member
        ]);
    }
}
