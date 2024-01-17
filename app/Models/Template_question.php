<?php

namespace App\Models;

use App\Models\Opd;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Template_question extends Model
{
    use HasFactory;
    protected $table = 'template_questions';
    protected $fillable = ['nama', 'opd_id'];

    function questions(){
    return $this->hasMany(Item_question::class);
    }

    function opd(){
        return $this->belongsTo(Opd::class, 'opd_id');
    }
}
