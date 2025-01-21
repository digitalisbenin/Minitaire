<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notequiz extends Model
{
    use HasFactory;

    protected $fillable = ['formation_id', 'user_id','chapitre_id','quiz_id','description','titre','note', 'created_at', 'updated_at'];
}
