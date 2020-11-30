<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class MovieProductionCountry
 * @package App\Models
 */
class MovieProductionCountry extends Model
{
    /**
     * The table associated with the model
     *
     * @var string
     */
    public $table = 'movie_production_countries';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    public $fillable = [
        'id_movie', 'iso_3166_1'
    ];

    /**
     * The attributes that should be casted to native types
     *
     * @var array
     */
    protected $casts = [
        'id_movie' => 'integer',
        'iso_3166_1' => 'string',
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
    public function productionCountry()
    {
        return $this->belongsTo(\App\Models\ProductionCompany::class, 'id_production_company', 'id');
    }
}
