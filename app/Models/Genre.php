<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Genre
 * @package App\Models
 */
class Genre extends Model
{
    /**
     * The table associated with the model
     *
     * @var string
     */
    public $table = 'genres';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    public $fillable = [
        'name',
    ];

    /**
     * The attributes that should be casted to native types
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
    ];

    // =========================================================================
    // Relationships
    // =========================================================================

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function movieGenre()
    {
        return $this->hasMany(\App\Models\MovieGenre::class, 'id_genre', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function movies()
    {
        return $this->hasManyThrough(\App\Models\Movie::class, \App\Models\MovieGenre::class);
    }
}
