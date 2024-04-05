<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipements extends Model
{
    use HasFactory;
    protected $fillable = [
        'equipement',
        'serialnumber',
        'productnumber',
        'equipementtype',
        'location_id',
        'site_id',
        'state_id',
        'available',
        'feedback',
        'observation',
    ];

    /**
     * Get the user that owns the Equipements
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function State()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    /**
     * Get the user that owns the Equipements
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Site()
    {
        return $this->belongsTo(Site::class);
    }

    /**
     * Get the user that owns the Equipements
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Region()
    {
        return $this->belongsTo(Region::class, 'location_id', 'id');
    }

    /**
     * Get the user that owns the Equipements
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Equipement()
    {
        return $this->belongsTo(EquipementType::class, 'equipementtype', 'id');
    }
}
