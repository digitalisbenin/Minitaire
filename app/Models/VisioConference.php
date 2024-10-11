<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $lien_meet
 * @property string $date
 * @property string $titre
 * @property string $created_at
 * @property string $updated_at
 * @property Meet[] $meets
 * @property User $user
 */
class VisioConference extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'lien_meet', 'date', 'titre', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function meets()
    {
        return $this->hasMany('App\Models\Meet', 'visio_conferences_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
