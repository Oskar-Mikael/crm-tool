<?php

namespace Database\Seeders;

use App\Models\TaskType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = collect([
            ['name' => 'task'],
            ['name' => 'meeting'],
            ['name' => 'phone call']
        ]);

        $types->each(function ($type) {
            TaskType::updateOrCreate($type);
        });
    }
}
