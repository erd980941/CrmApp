<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\SalesOpportunity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'user@example.com')->first();

        if ($user) {
            $salesOpportunities = SalesOpportunity::all();

            foreach ($salesOpportunities as $salesOpportunity) {
                Task::create([
                    'user_id' => $user->id,
                    // 'customer_id' => $salesOpportunity->customer->id,
                    'sales_opportunity_id' => $salesOpportunity->id,
                    'title' => 'Task for ' . $salesOpportunity->title,
                    'description' => 'Description for task related to ' . $salesOpportunity->title,
                    'status' => 'pending', 
                    'due_date' => now()->addDays(7), 
                ]);
            }
        } else {
            echo "User with email 'user@example.com' not found.\n";
        }
    }
}
