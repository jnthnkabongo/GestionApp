<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affectation extends Model
{
    use HasFactory;
    protected $fillable = [
        'operation',
        'useraffected',
        'location',
        'site',
        'reason',
        'equipement_id'
    ];



    /**
     * Get the user that owns the Affectation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function EquipementAffect()
    {
        return $this->belongsTo(Equipements::class, 'equipement_id', 'id');
    }
    /**
     * Get the user that owns the Affectation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Site()
    {
        return $this->belongsTo(Site::class, 'site', 'id');
    }
    /**
     * Get the user that owns the Affectation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Region()
    {
        return $this->belongsTo(Region::class, 'location', 'id');
    }
    /**
     * Get the user that owns the Affectation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Staff()
    {
        return $this->belongsTo(Staff::class, 'useraffected', 'id');
    }
    /**
     * Get the user that owns the Affectation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Operation()
    {
        return $this->belongsTo(EtatAffectation::class, 'operation', 'id');
    }
}
