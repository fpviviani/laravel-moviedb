<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Credit
 * @package App\Models
 */
class Movie extends Model
{
    /**
     * The table associated with the model
     *
     * @var string
     */
    public $table = 'movies';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    public $fillable = [
        'original_language', 'original_title', 'popularity', 'status', 'title', 'vote_average', 'vote_count', 'release_date', 'budget', 'revenue', 'runtime', 'id_collection'
    ];

    /**
     * The attributes that should be casted to native types
     *
     * @var array
     */
    protected $casts = [
        'original_language' => 'string',
        'original_title' => 'string',
        'popularity' => 'string',
        'status' => 'string',
        'title' => 'string',
        'vote_average' => 'float',
        'vote_count' => 'integer',
        'release_date' => 'datetime',
        'budget' => 'float',
        'revenue' => 'float',
        'runtime' => 'integer',
        'id_collection' => 'integer',
    ];

    // =========================================================================
    // Relationships
    // =========================================================================

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function movieGenre()
    {
        return $this->hasMany(\App\Models\MovieGenre::class, 'id_movie', 'id');
    }
}
