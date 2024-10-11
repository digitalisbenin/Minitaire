<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $visio_conferences_id
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property VisioConference $visioConference
 */
class Meet extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'visio_conferences_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function visioConference()
    {
        return $this->belongsTo('App\Models\VisioConference', 'visio_conferences_id');
    }
}
