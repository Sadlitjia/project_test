<?php

namespace App\Models;

use App\Models\Answer_question;
use App\Models\Template_question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item_question extends Model
{
    use HasFactory;

    protected $fillable = ['pertanyaan', 'template_question_id'];

    function template_question(){
        return $this->belongsTo(Template_question::class);
    }

    function answer_question(){
        return $this->hasMany(Answer_question::class);
    }
}
