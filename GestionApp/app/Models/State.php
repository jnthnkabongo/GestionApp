<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $fillable = [
        'intitule'
    ];

    /**
     * Get the user that owns the State
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function State()
    {
        return $this->belongsTo(Equipements::class, 'id', 'state_id');
    }
}
