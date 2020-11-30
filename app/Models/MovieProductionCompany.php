<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class MovieProductionCompany
 * @package App\Models
 */
class MovieProductionCompany extends Model
{
    /**
     * The table associated with the model
     *
     * @var string
     */
    public $table = 'movie_production_companies';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    public $fillable = [
        'id_movie', 'id_production_company'
    ];

    /**
     * The attributes that should be casted to native types
     *
     * @var array
     */
    protected $casts = [
        'id_movie' => 'integer',
        'id_production_company' => 'string',
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
    public function productionCompany()
    {
        return $this->belongsTo(\App\Models\ProductionCompany::class, 'id_production_company', 'id');
    }
}
