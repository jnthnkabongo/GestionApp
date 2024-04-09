<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom'
    ];

    /**
     * Get all of the comments for the Region
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Regions()
    {
        return $this->hasMany(Equipements::class, 'location_id', 'id');
    }
}
