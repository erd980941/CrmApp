<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('name', 'Admin')->first();
        $adminPermissions = Permission::all();
        $adminRole->permissions()->sync($adminPermissions->pluck('id'));

        $managerRole = Role::where('name', 'Manager')->first();
        $managerPermissions = Permission::whereIn('name', [
            'ViewSalesOpportunity', 'CreateSalesOpportunity', 'EditSalesOpportunity',
            'ViewTask', 'CreateTask', 'EditTask'
        ])->get();
        $managerRole->permissions()->sync($managerPermissions->pluck('id'));

        $salesRole = Role::where('name', 'Sales')->first();
        $salesPermissions = Permission::whereIn('name', [
            'IndexSalesOpportunity',' CreateSalesOpportunity', 'ViewSalesOpportunity', 
            'IndexTask', 'ViewTask', 'CreateTask',
            'IndexCustomer', 'ViewCustomer', 'CreateCustomer',
        ])->get();
        $salesRole->permissions()->sync($salesPermissions->pluck('id'));

        $supportRole = Role::where('name', 'Support')->first();
        $supportPermissions = Permission::whereIn('name', [
            'ViewSalesOpportunity',
            'IndexTask', 'ViewTask', 'CreateTask',
        ])->get();
        $supportRole->permissions()->sync($supportPermissions->pluck('id'));
    }
}
