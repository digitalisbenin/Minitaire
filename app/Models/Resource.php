<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $titre
 * @property string $description
 * @property string $image_url
 * @property string $video_url
 * @property string $document_url
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 */
class Resource extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'titre', 'description', 'image_url', 'video_url', 'document_url', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
