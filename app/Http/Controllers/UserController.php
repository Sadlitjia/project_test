<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Opd;
use App\Models\{Pengguna, Answer_question};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function index()
    {
        $user = Auth::user()->pengguna->nama;       

        return view('pengguna.index', compact('user'));
    }

    //method input form
    public function Pertanyaan()
    {
        $opdId = Auth::user()->pengguna->opd_id;
        $templateQuestions = Opd::find($opdId)->templateQuestions;
        $pertanyaan = [];
        foreach ($templateQuestions as $templateQuestion) {
            $pertanyaan = array_merge($pertanyaan, $templateQuestion->questions->toArray());
        }

        return view('pengguna.form', ['pertanyaan' => $pertanyaan]);
    }
  
    public function store(Request $request)
    {
        request()->validate([
            'jawaban' => 'required',
        ]);

        $pengguna = Auth::user()->pengguna->id;

        for($i = 0; $i < count($request->jawaban); $i++){
            $data = [
                'pengguna_id' => $pengguna,
                'tanggal' => date('Y-m-d'), // '2021-08-20
                'item_question_id' => $request->item_question_id[$i],
                'jawaban' => $request->jawaban[$i],
            ];
            $data = Answer_question::create($data);
        }

        return redirect()->route('user.form')
            ->with('success', 'Data berhasil ditambahkan.');
    }


    //method history
    public function history()
    {
        $pengguna = Auth::user()->pengguna;
        $historyDates = Answer_question::where('pengguna_id', $pengguna->id)
            ->orderBy('tanggal', 'desc')
            ->distinct('tanggal')
            ->pluck('tanggal');

        return view('pengguna.history', compact('historyDates'));
    }

    public function showAnswersByDate($tanggal)
    {
        $pengguna = Auth::user()->pengguna;
        $answers = Answer_question::where('pengguna_id', $pengguna->id)
            ->whereDate('tanggal', Carbon::parse($tanggal))
            ->get();

        return view('pengguna.show_history', compact('answers', 'tanggal'));
    }
}

