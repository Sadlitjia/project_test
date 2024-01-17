<?php

namespace App\Http\Controllers;

use App\Models\Opd;
use Illuminate\Http\Request;
use App\Exports\AnswerExport;
use App\Models\Answer_question;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\View;

class ExportController extends Controller
{
    public function exportToPDF(Opd $opd)
    {
        $answers = Answer_question::whereHas('pengguna', function ($query) use ($opd) {
            $query->where('opd_id', $opd->id);
        })->orderBy('tanggal', 'desc')->get();

        $pdf = PDF::loadView('admin.answer_question.export_pdf', compact('answers', 'opd'));

        return $pdf->download('answers_export.pdf');
    }

    
    public function exportToExcel(Opd $opd)
    {
        $answers = Answer_question::whereHas('pengguna', function ($query) use ($opd) {
            $query->where('opd_id', $opd->id);
        })->orderBy('tanggal', 'desc')->get();

        return Excel::download(new AnswerExport($answers), 'answers_export.xlsx');
    }

    public function printPDF(Opd $opd)
    {
        $answers = Answer_question::whereHas('pengguna', function ($query) use ($opd) {
            $query->where('opd_id', $opd->id);
        })->orderBy('tanggal', 'desc')->get();

        $pdf = PDF::loadView('admin.answer_question.export_pdf', compact('answers', 'opd'));

        // You can adjust the file name as needed
        // $pdf->save('path_to_save/answers_export.pdf');

        // Open the PDF view in a new tab
        $view = View::make('admin.answer_question.export_pdf', compact('answers', 'opd'));
        return $view->render();
    }
}
