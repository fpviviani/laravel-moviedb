<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class ProductionCompany
 * @package App\Models
 */
class ProductionCompany extends Model
{
    /**
     * The table associated with the model
     *
     * @var string
     */
    public $table = 'production_companies';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    public $fillable = [
        'name', 'origin_country'
    ];

    /**
     * The attributes that should be casted to native types
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'origin_country' => 'string',
    ];

    // =========================================================================
    // Relationships
    // =========================================================================

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function movieProductionCompany()
    {
        return $this->hasMany(\App\Models\MovieProductionCompany::class, 'id_production_company', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function movies()
    {
        return $this->hasManyThrough(\App\Models\Movie::class, \App\Models\MovieProductionCompany::class);
    }
}
