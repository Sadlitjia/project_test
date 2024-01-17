<?php

namespace App\Models;

use App\Models\Opd;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengguna extends Model
{
    use HasFactory;
    
    protected $fillable = [
    'role', 'nama', 'opd_id', 'user_id',
    ];

    public function opd(){
        return $this->belongsTo(Opd::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Override the delete method to delete the associated user
    public function delete()
    {
        $this->user()->delete(); // Delete the associated user
        parent::delete(); // Call the parent delete method
    }

}
