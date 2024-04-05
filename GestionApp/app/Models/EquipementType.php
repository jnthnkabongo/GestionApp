<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipementType extends Model
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
        'observation'
    ];

   /**
    * Get the user that owns the EquipementType
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function State()
   {
       return $this->belongsTo(State::class, 'foreign_key', 'other_key');
   }
}
