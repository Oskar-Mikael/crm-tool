<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::updateOrCreate([
            'name' => 'Meet with nurse',
            'priority' => 'Medium',
            'status_id' => 1,
            'type_id' => 2,
            'start_date' => now()->toDateTimeString(),
            'customer_type' => 'Customer',
            'customer_id' => 1,
            'description' => 'Make plans',
            'created_by_id' => 1,
            'assigned_user_id' => 1
        ]);
    }
}
