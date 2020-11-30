<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class ProductionCountry
 * @package App\Models
 */
class ProductionCountry extends Model
{
    /**
     * The table associated with the model
     *
     * @var string
     */
    public $table = 'production_countries';

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function movieProductionCountry()
    {
        return $this->hasMany(\App\Models\MovieProductionCountry::class, 'iso_3166_1', 'iso_3166_1');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function movies()
    {
        return $this->hasManyThrough(\App\Models\Movie::class, \App\Models\MovieProductionCountry::class);
    }
}
