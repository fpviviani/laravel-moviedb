<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class TrendingMovie
 * @package App\Models
 */
class TrendingMovie extends Model
{
    /**
     * The table associated with the model
     *
     * @var string
     */
    public $table = 'trending_movies';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    public $fillable = [
        'name', 'iso_3166_1'
    ];

    /**
     * The attributes that should be casted to native types
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'iso_3166_1' => 'string',
    ];

    // =========================================================================
    // Relationships
    // =========================================================================

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    // public function movies()
    // {
    //     return $this->hasMany(\App\Models\Movie::class, 'collection_id', 'id');
    // }
}
