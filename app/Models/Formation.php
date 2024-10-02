<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $categorie_id
 * @property integer $difficulte_id
 * @property string $titre
 * @property string $description
 * @property string $image_url
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property Certificate[] $certificates
 * @property Chapitre[] $chapitres
 * @property Evaluation[] $evaluations
 * @property Category $category
 * @property User $user
 * @property Difficulete $difficulete
 * @property MesCour[] $mesCours
 */
class Formation extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'categorie_id', 'difficulte_id', 'titre', 'description', 'image_url', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function certificates()
    {
        return $this->hasMany('App\Models\Certificate');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function chapitres()
    {
        return $this->hasMany('App\Models\Chapitre');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function evaluations()
    {
        return $this->hasMany('App\Models\Evaluation');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'categorie_id');
    }

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
    public function difficulete()
    {
        return $this->belongsTo('App\Models\Difficulete', 'difficulte_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mesCours()
    {
        return $this->hasMany('App\Models\MesCour');
    }
}
