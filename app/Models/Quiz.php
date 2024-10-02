<?php

namespace App\Models;


use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory, Uuid;

    protected $fillable = ['title', 'description' ,'status'];

    public function question()
    {
        return $this->hasMany(Question::class);
    }

    public function userResult()
        {
            return $this->hasMany(UserResult::class);
        }
}
