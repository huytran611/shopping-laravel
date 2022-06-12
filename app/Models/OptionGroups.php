<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionGroups extends Model
{
    use HasFactory;
    protected $table = 'optiongroups';

    public function attributeValues()
    {
        return $this->hasMany(ProductOptions::class);
    }
}
