<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'priority',
        'status',
        'type_id',
        'start_date',
        'end_date',
        'complete_date',
        'customer_type',
        'customer_id',
        'description',
        'created_by_id',
        'modified_by_id',
        'assigned_user_id'

    ];

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_user_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function type()
    {
        return $this->belongsTo(TaskType::class, 'task_id');
    }

    public function status()
    {
        return $this->belongsTo(TaskStatus::class, 'status_id');
    }
}
