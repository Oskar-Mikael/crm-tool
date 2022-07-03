<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::factory()->hasTasks(3)->create([
            'name' => 'OskarAB',
            'email' => 'oskarab@gmail.com',
            'phone' => '93923716',
            'vat_number' => '123456',
            'address' => 'Poppelstykket 6',
            'city' => 'Copenhagen',
            'zipcode' => '2450',
            'setup_complete' => 1
        ]);
    }
}
