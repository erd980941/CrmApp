<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create([
            'name' => 'Customer One',
            'email' => 'customer1@example.com',
            'phone' => '+1234567890',
            'address' => '123 Main St, Example City',
            'company' => 'Example Corp',
        ]);

        Customer::create([
            'name' => 'Customer Two',
            'email' => 'customer2@example.com',
            'phone' => '+1987654321',
            'address' => '456 Second St, Example City',
            'company' => 'Sample LLC',
        ]);

        Customer::create([
            'name' => 'Customer Three',
            'email' => 'customer3@example.com',
            'phone' => '+1122334455',
            'address' => '789 Third St, Sample City',
            'company' => 'Demo Industries',
        ]);

        Customer::create([
            'name' => 'Customer Four',
            'email' => 'customer4@example.com',
            'phone' => '+1223344556',
            'address' => '101 Fourth St, Demo City',
            'company' => 'Test Solutions',
        ]);

        Customer::create([
            'name' => 'Customer Five',
            'email' => 'customer5@example.com',
            'phone' => '+1334455667',
            'address' => '202 Fifth St, Test City',
            'company' => 'Innovative Solutions',
        ]);
    }
}
