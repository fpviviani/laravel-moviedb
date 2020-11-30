<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Credit
 * @package App\Models
 */
class Credit extends Model
{
    /**
     * The table associated with the model
     *
     * @var string
     */
    public $table = 'credits';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    public $fillable = [
        'credit_type', 'department', 'job', 'character', 'id_movie', 'id_people'
    ];

    /**
     * The attributes that should be casted to native types
     *
     * @var array
     */
    protected $casts = [
        'credit_id' => 'integer',
        'credit_type' => 'string',
        'department' => 'string',
        'job' => 'string',
        'character' => 'string',
        'id_movie' => 'integer',
        'id_people' => 'integer',
    ];

    // =========================================================================
    // Relationships
    // =========================================================================

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function movie()
    {
        return $this->belongsTo(\App\Models\Movie::class, 'movie_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function person()
    {
        return $this->belongsTo(\App\Models\Person::class, 'id_people', 'id');
    }
}
