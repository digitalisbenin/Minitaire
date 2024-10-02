<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $discution_id
 * @property integer $user_id
 * @property string $titre
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 * @property Discution $discution
 * @property User $user
 */
class DiscutionReponse extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['discution_id', 'user_id', 'titre', 'content', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function discution()
    {
        return $this->belongsTo('App\Models\Discution');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
