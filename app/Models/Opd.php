<?php

namespace App\Models;

use App\Models\Pengguna;
use App\Models\Template_question;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\Template\Template;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Opd extends Model
{
    use HasFactory;

    
    protected $fillable = [
    'nama',
    ];

    public function pengguna(){
        return $this->hasOne(Pengguna::class);
    }

    public function templateQuestions() {
        return $this->hasMany(Template_question::class, 'opd_id');
    }
}
