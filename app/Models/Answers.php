<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    use HasFactory, Uuid;

    protected $fillable = ['title', 'is_correct' ,'question_id'];

    public function question()
    {
        return $this->belongsTo('App\Models\Question');
    }

    public function userResult()
        {
            return $this->hasMany(UserResult::class);
        }
}
