<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Customer;
use App\Models\Interaction;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InteractionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = Customer::all();
        $user = User::where('email', 'user@example.com')->first();
        if ($customers && $user) {
            foreach ($customers as $customer) {
                Interaction::create([
                    'customer_id' => $customer->id,
                    'user_id' => $user->id, 
                    'type' => 'call', 
                    'notes' => 'This is a sample interaction note.',
                    'interaction_date' => Carbon::now(),
                ]);
            }
        }
    }
}
