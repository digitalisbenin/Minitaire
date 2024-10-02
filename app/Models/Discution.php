<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $titre
 * @property string $content
 * @property string $image_url
 * @property string $created_at
 * @property string $updated_at
 * @property DiscutionReponse[] $discutionReponses
 * @property User $user
 */
class Discution extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'titre', 'content', 'image_url', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function discutionReponses()
    {
        return $this->hasMany('App\Models\DiscutionReponse');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
