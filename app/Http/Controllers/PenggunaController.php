<?php

namespace App\Http\Controllers;

use App\Models\Opd;
use App\Models\User;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        $penggunas = Pengguna::with('opd')->with('user')->get();
        return view('admin.pengguna.index', compact('penggunas'));
    }

    public function create()
    {
        $opds = Opd::all();
        return view('admin.pengguna.create', compact('opds'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'opd_id' => 'required',

        ]);

        $user = User::create([
            'name' => $data['nama'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $data['user_id'] = $user->id;
        

        $pengguna = Pengguna::create($data);
        
        return redirect()->route('pengguna.index');
    }

  

    public function edit(Pengguna $pengguna)
    {
        $opds = Opd::all();
        return view('admin.pengguna.edit', compact('pengguna','opds'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'opd_id' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $data['nama'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $data['user_id'] = $user->id;
        $data['role'] = 'pengguna';

        $pengguna = Pengguna::findOrFail($id);
        $pengguna->update($data);
        
        return redirect()->route('pengguna.index');
    }



    public function destroy(Pengguna $pengguna)
    {
        $pengguna->delete();

        return redirect()->route('pengguna.index');
    }
}
