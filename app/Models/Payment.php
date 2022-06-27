<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_name',
        'payment_number',
        'payment_owner',
        'user_id',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopePayment($query, array $filters) 
    {
        $query->when($filters['cari'] ?? false, function ($query, $cari) {
            $query->where('payment_name', 'like', "%{$cari}%")->orWhere('payment_number', 'like', "%{$cari}%")->orWhere('payment_owner', 'like', "%{$cari}%");
        });
    }
}
