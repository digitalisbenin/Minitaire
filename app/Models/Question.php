<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory, Uuid;

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
