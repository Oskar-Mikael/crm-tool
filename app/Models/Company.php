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

    public function allTasks()
    {
        return $this->hasMany(Task::class, 'company_id');
    }

    public function tasks()
    {
        return $this->allTasks()->where('status_id', '!=', 4);
    }

    public function archivedTasks()
    {
        return $this->allTasks()->where('status_id', 4);
    }

    public function openTasks()
    {
        return $this->allTasks()->whereIn('status_id', [1,2]);
    }
}
