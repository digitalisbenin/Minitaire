<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $formation_id
 * @property string $titre
 * @property string $description
 * @property string $image_url
 * @property string $video_url
 * @property string $document_url
 * @property string $created_at
 * @property string $updated_at
 * @property Formation $formation
 * @property Commentaire[] $commentaires
 * @property Suivy[] $suivies
 */
class Chapitre extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['formation_id', 'titre', 'description', 'image_url', 'video_url', 'document_url', 'created_at', 'updated_at'];

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
    public function commentaires()
    {
        return $this->hasMany('App\Models\Commentaire');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function suivies()
    {
        return $this->hasMany('App\Models\Suivy');
    }
}
