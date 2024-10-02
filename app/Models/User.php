<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $role_id
 * @property integer $user_categorie_id
 * @property string $name
 * @property string $prenom
 * @property string $adresse
 * @property string $telephone
 * @property string $post
 * @property string $profile_photo_path
 * @property string $email
 * @property string $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 * @property Certificate[] $certificates
 * @property Commentaire[] $commentaires
 * @property DiscutionReponse[] $discutionReponses
 * @property Discution[] $discutions
 * @property Evaluation[] $evaluations
 * @property Formation[] $formations
 * @property MesCour[] $mesCours
 * @property Resource[] $resources
 * @property Suivy[] $suivies
 * @property Role $role
 * @property UserCategory $userCategory
 * @property Video[] $videos
 */
class User extends Authenticatable
{
    /**
     * @var array
     */
    protected $fillable = ['role_id', 'user_categorie_id', 'name', 'prenom', 'adresse', 'telephone', 'post', 'corps', 'sex','diplome','specialie','services','age','situation_matrimoniale','nombre_enfant', 'profile_photo_path', 'email', 'email_verified_at', 'password', 'remember_token', 'created_at', 'updated_at'];

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
    public function commentaires()
    {
        return $this->hasMany('App\Models\Commentaire');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function discutionReponses()
    {
        return $this->hasMany('App\Models\DiscutionReponse');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function discutions()
    {
        return $this->hasMany('App\Models\Discution');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function evaluations()
    {
        return $this->hasMany('App\Models\Evaluation');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function formations()
    {
        return $this->hasMany('App\Models\Formation');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mesCours()
    {
        return $this->hasMany('App\Models\MesCour');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function resources()
    {
        return $this->hasMany('App\Models\Resource');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function suivies()
    {
        return $this->hasMany('App\Models\Suivy');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userCategory()
    {
        return $this->belongsTo('App\Models\UserCategory', 'user_categorie_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function videos()
    {
        return $this->hasMany('App\Models\Video');
    }
}
