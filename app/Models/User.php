<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Customer;
use App\Models\Partner;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'type',
        'status',
        'entry_time',
        'out_time',
        'days',
        'password',
    ];

    public function setDaysAttribute($value)
    {
        $this->attributes['days'] = json_encode($value);
    }

    public function getDaysAttribute($value)
    {
        return $this->attributes['days'] = json_decode($value);
    }


    public function customers(){
        return $this->belongsToMany(Customer::class, 'customer_partner_user');
    }

    public function partners(){
        return $this->belongsToMany(Partner::class, 'customer_partner_user');
    }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
