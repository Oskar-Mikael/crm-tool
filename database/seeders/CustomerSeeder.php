<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::updateOrCreate([
            'company_id' => 1,
            'first_name' => 'Chanita',
            'last_name' => 'Suriyabun',
            'email' => 'chanita@gmail.com',
            'phone' => '12345',
            'status' => 1,
            'position_title' => 'Nurse',
            'industry' => 'Health Care',
            'project_type' => 'Heart Transplant',
            'project_description' => 'Need a new heart',
            'description' => 'She the best nurse',
            'budget' => '10000',
            'website' => 'https://chanita.com/',
            'created_by_id' => 1
        ]);
    }
}
