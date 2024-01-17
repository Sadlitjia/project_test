<?php

namespace App\Http\Controllers;

use App\Models\Opd;
use Illuminate\Http\Request;
use App\Models\Template_question;
use App\Http\Controllers\Controller;
use SebastianBergmann\Template\Template;

class TemplateController extends Controller
{
    public function index()
    {
        $opds = Opd::all(); // Fetch all OPDs
        $template_questions = Template_question::with('opd')->get();

        return view('admin.template_question.index', compact('template_questions', 'opds'));
    }

    // public function create()
    // {
    //     // Jika Anda membutuhkan data tertentu misalnya untuk dropdown, Anda dapat menyediakannya di sini
    //     return view('admin.template_question.create');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'opd_id' => 'required',
        ]);

        Template_question::create($request->all());

        return redirect()->route('admin.template_question')->with('success', 'Template Question berhasil ditambahkan');
    }

    public function edit(Template_question $template_question)
    {
        return view('template_questions.edit', compact('template_question'));
    }

    public function update(Request $request, Template_question $template_question)
    {
        $request->validate([
            'nama' => 'required',
            'opd_id' => 'required|exists:opds,id',
        ]);

        $template_question->update($request->all());

        return redirect()->route('admin.template_question')->with('success', 'Template Question berhasil diperbarui');
    }

    public function destroy(Template_question $template_question)
    {
        $template_question->delete();

        return redirect()->route('admin.template_question')->with('success', 'Template Question berhasil dihapus');
    }

    
}
