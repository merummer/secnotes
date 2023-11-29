<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    //Schutzmechanismus
    protected $fillable = [
        'title',
        'content',
        'favorite',
        'description',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
