<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Item_question;
use App\Models\Template_question;
use App\Http\Controllers\Controller;

class ItemQuestionController extends Controller
{
    public function index()
    {   
        $template_questions = Template_question::all();
        $item_questions = Item_question::with('template_question')->get();
        return view('admin.item_question.index', compact('item_questions', 'template_questions'));
    }

    // public function create()
    // {
    //     return view('admin.item_question.create');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required',
            'template_question_id' => 'required',
        ]);

        Item_question::create($request->all());

        return redirect()->route('admin.item_question')->with('success', 'Item Question berhasil ditambahkan');
    }

    public function edit(Item_question $item_question)
    {
        return view('admin.item_question.edit', compact('item_question'));
    }

    public function update(Request $request, Item_question $item_question)
    {
        $request->validate([
            'pertanyaan' => 'required',
            'template_question_id' => 'required',
        ]);

        $item_question->update($request->all());

        return redirect()->route('admin.item_question')->with('success', 'Item Question berhasil diperbarui');
    }

    public function destroy(Item_question $item_question)
    {
        $item_question->delete();

        return redirect()->route('admin.item_question')->with('success', 'Item Question berhasil dihapus');
    }
}
