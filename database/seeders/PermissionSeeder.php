<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'CreateSalesOpportunity']);
        Permission::create(['name' => 'EditSalesOpportunity']);
        Permission::create(['name' => 'DeleteSalesOpportunity']);
        Permission::create(['name' => 'ViewSalesOpportunity']);

        Permission::create(['name' => 'CreateTask']);
        Permission::create(['name' => 'EditTask']);
        Permission::create(['name' => 'DeleteTask']);
        Permission::create(['name' => 'ViewTask']);

        Permission::create(['name' => 'CreateCustomer']);
        Permission::create(['name' => 'EditCustomer']);
        Permission::create(['name' => 'DeleteCustomer']);
        Permission::create(['name' => 'ViewCustomer']);

        Permission::create(['name' => 'CreateInteraction']);
        Permission::create(['name' => 'EditInteraction']);
        Permission::create(['name' => 'DeleteInteraction']);
        Permission::create(['name' => 'ViewInteraction']);

        Permission::create(['name' => 'CreateUser']);
        Permission::create(['name' => 'EditUser']);
        Permission::create(['name' => 'DeleteUser']);
        Permission::create(['name' => 'ViewUser']);

        Permission::create(['name' => 'EditSetting']);

    }
}
