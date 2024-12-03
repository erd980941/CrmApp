<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use App\Models\SalesOpportunity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SalesOpportunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = Customer::all();

        foreach ($customers as $customer) {
            SalesOpportunity::create([
                'customer_id' => $customer->id,
                'title' => 'Opportunity for ' . $customer->name,
                'description' => 'This is a sample sales opportunity for ' . $customer->name,
                'value' => rand(1000, 5000), // Rastgele bir değer
                'status' => 'open', // Varsayılan olarak açık durumda
            ]);
        }
    }
}
