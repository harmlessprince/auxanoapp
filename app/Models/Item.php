<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
