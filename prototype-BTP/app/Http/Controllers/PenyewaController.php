<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;


class PenyewaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('loginsys.daftarPenyewa', [
        //     'title' => 'Daftar',
        //     'active' => 'daftar'
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Users::all();
        return view('registersys.daftarPenyewa', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'role' => 'required',
            'nama_lengkap' => 'required|string|max:255',
            'password' => 'required'
        ]);

        $penyewa = new Users([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'nama_lengkap' => $request->input('nama_lengkap'),
            'password' => bcrypt($request->input('password')),
        ]);

        $penyewa->save();

        return redirect('/')->with('success', 'Registration Successfull~ Please Login!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
