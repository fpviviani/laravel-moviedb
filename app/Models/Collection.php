<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Collection
 * @package App\Models
 */
class Collection extends Model
{
    /**
     * The table associated with the model
     *
     * @var string
     */
    public $table = 'collections';

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function movies()
    {
        return $this->hasMany(\App\Models\Movie::class, 'id_collection', 'id');
    }
}
