<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Partner;
use App\Models\User;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','user_id', 'last_name', 'phone', 'email', 'document', 'address', 'investment_mount', 'rate'
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'customer_partner_user');
    }

    public function partner(){
        return $this->belongsTo(Partner::class, 'customer_partner_user');
    }

}
