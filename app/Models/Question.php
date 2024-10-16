<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'quiz_id' ];


    public function quiz()
    {
        return $this->belongsTo('App\Models\Quiz');
    }

    public function userResult()
        {
            return $this->hasMany(UserResult::class);
        }

    public function answers()
    {
        return $this->hasMany(Answers::class);
    }
}
