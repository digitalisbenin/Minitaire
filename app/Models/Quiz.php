<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $formation_id
 * @property string $title
 * @property string $description
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property Question[] $questions
 * @property Formation $formation
 * @property UserResult[] $userResults
 */
class Quiz extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['formation_id', 'title', 'description', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function formation()
    {
        return $this->belongsTo('App\Models\Formation');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userResults()
    {
        return $this->hasMany('App\Models\UserResult');
    }
}
