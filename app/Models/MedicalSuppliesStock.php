<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalSuppliesStock extends Model
{
    protected $guarded = [];


    public function medic_supplies()
    {
        return $this->belongsTo(MedicalSupplies::class,'medic_equipement_id','id');
    }




}
