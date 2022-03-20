<?php

namespace Database\Seeders;

use App\Models\TaskStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = collect([
            ['name' => 'draft'],
            ['name' => 'in_progress'],
            ['name' => 'done'],
            ['name' => 'archived']
        ]);

        $statuses->each(function ($status) {
            TaskStatus::updateOrCreate($status);
        });
    }
}
