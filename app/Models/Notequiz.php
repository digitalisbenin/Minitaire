<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notequiz extends Model
{
    use HasFactory;

    protected $fillable = ['formation_id', 'user_id','chapitre_id','quiz_id','description','status','titre','note', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function formation()
    {
        return $this->belongsTo('App\Models\Formation');
    }

    public function chapitres()
    {
        return $this->belongsTo('App\Models\Chapitre');
    }
    public function quiz()
    {
        return $this->belongsTo('App\Models\Quiz');
    }
}
