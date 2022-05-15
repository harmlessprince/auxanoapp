<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;
class Task extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    // protected $with = ['creator', 'assignedTo'];

    protected static function booted()
    {
        static::updating(function ($task) {
           $task->updated_by = auth()->id();
        });
    }

    public function scopeUserTasks($query)
    {
        // dd(auth()->id());
        return $query->where('created_by', auth()->id())->orWhere('assigned_to', auth()->id());
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
