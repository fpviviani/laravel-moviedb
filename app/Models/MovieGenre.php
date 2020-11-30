<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class MovieGenre
 * @package App\Models
 */
class MovieGenre extends Model
{
    /**
     * The table associated with the model
     *
     * @var string
     */
    public $table = 'movie_genres';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    public $fillable = [
        'id_movie', 'id_genre'
    ];

    /**
     * The attributes that should be casted to native types
     *
     * @var array
     */
    protected $casts = [
        'id_movie' => 'integer',
        'id_genre' => 'integer',
    ];

    // =========================================================================
    // Relationships
    // =========================================================================

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function movie()
    {
        return $this->belongsTo(\App\Models\Movie::class, 'id_movie', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function genre()
    {
        return $this->belongsTo(\App\Models\Genre::class, 'id_genre', 'id');
    }
}
