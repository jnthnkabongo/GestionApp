<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtatAffectation extends Model
{
    use HasFactory;
    protected $fillable = [
        'intitule'
    ];

    /**
     * Get the user that owns the EtatAffectation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Affectation()
    {
        return $this->belongsTo(Affectation::class, 'operation', 'id');
    }
}
