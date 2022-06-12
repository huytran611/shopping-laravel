<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOptions extends Model
{
    use HasFactory;
    protected $table = 'productoptions';
    
    public function optionValues()
    {
        return $this->hasMany(OptionValue::class);
    }

    public function productAttribute()
    {
        return $this->belongsTo(OptionGroups::class,'product_option_id');
    }
}
