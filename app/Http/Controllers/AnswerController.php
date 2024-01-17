<?php

namespace App\Http\Controllers;

use App\Models\Opd;
use Illuminate\Http\Request;
use App\Models\Answer_question;
use App\Http\Controllers\Controller;

class AnswerController extends Controller
{
    public function showOpdList()
    {
        $opds = Opd::all();
        return view('admin.answer_question.index', compact('opds'));
    }
    public function showAnswersByOpd(Opd $opd)
    {
        $answers = Answer_question::whereHas('pengguna', function ($query) use ($opd) {
            $query->where('opd_id', $opd->id);
        })->orderBy('tanggal', 'desc')->get();

        return view('admin.answer_question.show_data', compact('answers', 'opd'));
    }
    
}
