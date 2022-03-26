<?php

namespace App\Models;

use App\Enums\UserType;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;
    protected $append = ['full_name'];
    // protected $with = ['roles'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function role()
    // {
    //     return $this->hasOne(Role::class, 'model_id')->latestOfMany();
    // }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function agentTickets()
    {
        return $this->hasMany(Ticket::class, 'agent_id');
    }
    public function agentCompleteTickets()
    {
        return $this->hasMany(Ticket::class, 'agent_id')->whereNotNull('completed_at');
    }
    public function agentOpenTickets()
    {
        return $this->hasMany(Ticket::class, 'agent_id')->whereNull('completed_at');
    }
    public function userTickets()
    {
        return $this->hasMany(Ticket::class, 'user_id');
    }
    public function userCompleteTickets()
    {
        return $this->hasMany(Ticket::class, 'user_id')->whereNotNull('completed_at');
    }
    public function userOpenTickets()
    {
        return $this->hasMany(Ticket::class, 'user_id')->whereNull('completed_at');
    }

    //SCOPES
    public function scopeSuperAdmins(Builder $query)
    {
        return $query->role(UserType::SUPER_ADMIN);
    }
    public function scopeAdmins(Builder $query)
    {
        return $query->role(UserType::ADMIN);
    }
    public function scopeAgents(Builder $query)
    {
        return $query->role(UserType::AGENT);
    }
    public function scopeTechnicians(Builder $query)
    {
        return $query->role(UserType::TECHNICIAN);
    }
}
