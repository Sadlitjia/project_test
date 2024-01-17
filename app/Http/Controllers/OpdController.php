<?php

namespace App\Http\Controllers;

use App\Models\Opd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OpdController extends Controller
{
    public function index()
    {   
        $user = Auth::user()->pengguna->nama;
        $opds = Opd::all();
        return view('admin.opd.index', compact('user','opds'));
    }

    public function store( Request $request){
        $data = $request->validate([
            'nama' => 'required', 
        ]);

        $opd = Opd::create($data);
        
        return redirect()->route('admin.opd');
    }

    public function edit(Opd $opd)
    {
        return view('admin.opd.index', compact('opd'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama' => 'required'
        ]);

        $opds = Opd::findOrFail($id);
        $opds->update($data);

        return redirect()->route('admin.opd');
    }

    public function destroy($id)
    {
        $opd = Opd::findOrFail($id);
        $opd->delete();

        return redirect()->route('admin.opd');
    }
}
