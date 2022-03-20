<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (!\App\Models\User::find(1)) $this->call(UserSeeder::class);

        $this->call(CompanySeeder::class);
        $this->call(CustomerAddressSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(CustomerStatusSeeder::class);
        $this->call(TaskStatusSeeder::class);
        $this->call(TaskTypeSeeder::class);
        $this->call(TaskSeeder::class);
    }
}
