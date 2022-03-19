<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'vat_number',
        'address',
        'city',
        'zipcode'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'company_id');
    }

    public function customers()
    {
        return $this->hasMany(Customer::class, 'company_id');
    }
}
