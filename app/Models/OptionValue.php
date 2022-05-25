<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionValue extends Model
{
    use HasFactory;

    public function productOptions()
    {
        return $this->belongsTo(ProductOptions::class,'option_id');
    }
}
