<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate([
            'name' => 'Oskar',
            'email' => 'oskar@gmail.com',
            'password' => Hash::make('oskbos00'),
            'company_id' => 1,
            'phone' => '93923716',
            'position_title' => 'Developer',
            'is_admin' => 1,
            'is_active' => 1,
        ]);
    }
}
