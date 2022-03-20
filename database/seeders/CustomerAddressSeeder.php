<?php

namespace Database\Seeders;

use App\Models\CustomerAddress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CustomerAddress::updateOrCreate([
            'customer_id' => 1,
            'street' => 'Poppelstykket 6',
            'city' => 'Copenhagen',
            'zipcode' => '2450',
            'country' => 'Denmark'
        ]);
    }
}
