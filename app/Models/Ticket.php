<?php

namespace App\Models;

use App\Enums\UserType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with =['agent', 'user', 'status', 'priority', 'category', 'audits', 'customer', 'comments', 'item', 'item.brand'];

    /**
     * Get all of the ticket's comments.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Get Ticket status.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function status()
    {
        return  $this->belongsTo(Status::class, 'status_id');
    }

    /**
     * Get Ticket priority.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function priority()
    {
        return   $this->belongsTo(Priority::class, 'priority_id');
    }


    /**
     * Get Ticket category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return   $this->belongsTo(Category::class, 'category_id');
    }

     /**
     * Get Ticket item.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item()
    {
        return   $this->hasOne(Item::class, 'ticket_id');
    }

    /**
     * Get Ticket audits.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function audits()
    {
        return  $this->hasMany(Audit::class);
    }


    /**
     * Get Ticket owner.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get Ticket agent.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    /**
     * Get Ticket customer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }


    public function hasComments()
    {
        return (bool) count($this->comments);
    }

    public function isComplete()
    {
        return (bool) $this->completed_at;
    }

  

    //scopes
    /**
     * List of completed tickets.
     *
     * @return Collection
     */
    public function scopeComplete($query)
    {
        return $query->whereNotNull('completed_at');
    }

    /**
     * List of active tickets.
     *
     * @return Collection
     */
    public function scopeActive($query)
    {
        return $query->whereNull('completed_at');
    }
}
