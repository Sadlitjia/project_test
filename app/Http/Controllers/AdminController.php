<?php

namespace App\Http\Controllers;

use App\Models\Opd;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use App\Models\Item_question;
use App\Models\Answer_question;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user()->pengguna->nama;
        $jumlahOpd = Opd::count();
        $jumlahPengguna = Pengguna::count();
        $jumlahPertanyaan = Item_question::count();
        $jumlahJawaban = Answer_question::count();

        return view('admin.index', compact('user','jumlahOpd', 'jumlahPengguna', 'jumlahPertanyaan', 'jumlahJawaban'));
    }

    
}
