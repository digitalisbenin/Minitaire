<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $formation_id
 * @property integer $user_id
 * @property string $created_at
 * @property string $updated_at
 * @property Formation $formation
 * @property User $user
 */
class Certificate extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['formation_id', 'user_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function formation()
    {
        return $this->belongsTo('App\Models\Formation');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
