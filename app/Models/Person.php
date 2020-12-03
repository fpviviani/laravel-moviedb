<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Credit
 * @package App\Models
 */
class Person extends Model
{
    /**
     * The table associated with the model
     *
     * @var string
     */
    public $table = 'people';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    public $fillable = [
        'name', 'gender', 'popularity', 'place_of_birth', 'birthday', 'deathday', 'known_for_department'
    ];

    /**
     * The attributes that should be casted to native types
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'gender' => 'string',
        'popularity' => 'string',
        'place_of_birth' => 'string',
        'birthday' => 'date',
        'deathday' => 'date',
        'known_for_department' => 'string',
    ];

    // =========================================================================
    // Relationships
    // =========================================================================

}
