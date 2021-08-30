<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Customer;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'last_name', 'phone', 'email', 'document', 'address', 'investment_mount', 'rate', 'percent_investment', 'percent_participation'
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'customer_partner_user');
    }

    public function customers(){
        return $this->hasMany(Customer::class);
    }
}
