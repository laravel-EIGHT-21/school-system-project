<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicines extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(MedicineCategory::class,'medicine_category_id','id');
    }


}
