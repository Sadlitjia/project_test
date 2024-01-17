<?php

namespace App\Models;

use App\Models\Pengguna;
use App\Models\Item_question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answer_question extends Model
{
    use HasFactory;
    protected $fillable = ['jawaban', 'pengguna_id','item_question_id','tanggal'];

    protected $table = 'answer_questions';

    function pengguna(){
        return $this->belongsTo(Pengguna::class);
    }

    function item_question(){
        return $this->belongsTo(Item_question::class);
    }

}
