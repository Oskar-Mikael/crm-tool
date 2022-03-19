<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'phone',
        'status',
        'posistion_title',
        'industry',
        'project_type',
        'project_description',
        'description',
        'budget',
        'website',
        'linkedin',
        'created_by_id',
        'modified_by_id',
        'assigned_user_id'
    ];

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_user_id');
    }

    public function addresses()
    {
        return $this->hasMany(CustomerAddress::class, 'company_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'customer_id');
    }

    public function getStatus()
    {
        return $this->hasMany(CustomerStatus::class, 'status');
    }
}
