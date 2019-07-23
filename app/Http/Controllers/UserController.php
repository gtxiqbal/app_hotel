<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'User Manager';
        $user = User::paginate(5);

        return view('usermanager.view', [
            'page_title' => $page_title,
            'userman' => $user,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Tambah User';

        return view('usermanager.add', [
            'page_title' => $page_title,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'level' => 'required',
        ]);

        if ($request->simpan == 'simpan') {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'level' => $request->level,
            ]);;
            return redirect()->back()->with(['status' => 'User Berhasil ditambahkan']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $user = User::where('id', $id)->first();
            $page_title = 'Edit User '.$user->name;

            $level = array('admin', 'user');

            return view('usermanager.edit', [
                'page_title' => $page_title,
                'users' => $user,
                'level' => $level,
            ]);
        } catch (ModelNotFoundException $exception) {
            return redirect()->back()->with(['status' => 'Gagal Edit : '.$exception]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::where(['id' => $request->id])->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->level = $request->level;
        if ($request->password != $user->password) {
            $user->password = $request->password;
        }
        $user->save();

        return redirect()->route('userman')->with(['status' => 'User '.$request->name.' berhasil diupdate!!!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::where('id', $id)->first();
            $user_nama = $user->name;
            $user->delete();
        } catch (ModelNotFoundException $exception) {
            return redirect()->back()->with(['status' => 'Gagal Hapus : '.$exception]);
        }

        return redirect()->back()->with(['status' => 'Berhasil Hapus '.$user_nama]);
    }
}
