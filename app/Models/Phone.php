<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phone extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'phones';

    protected $fillable = [
        'uuid',
        'phoneble_id',
        'phoneble_type',
        'type',
        'number'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];

    /**
     * relationship
     *
     * @return MorphTo
     */
    public function phoneble(): MorphTo
    {
        return $this->morphTo();
    }
}
