<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function item()
    {
        return $this->hasMany(Item::class);
    }
}
