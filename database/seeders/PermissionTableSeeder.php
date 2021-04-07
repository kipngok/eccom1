<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

	// Role::create(['name' => 'Dispatch officer']);

	Permission::create(['name' => 'Create Banner']);
	Permission::create(['name' => 'View Banner']);
	Permission::create(['name' => 'Edit Banner']);
	Permission::create(['name' => 'Delete Banner']);

	Permission::create(['name' => 'Create Category']);
	Permission::create(['name' => 'View Category']);
	Permission::create(['name' => 'Edit Category']);
	Permission::create(['name' => 'Delete Category']);

	Permission::create(['name' => 'Create Coupon']);
	Permission::create(['name' => 'View Coupon']);
	Permission::create(['name' => 'Edit Coupon']);
	Permission::create(['name' => 'Delete Coupon']);

	Permission::create(['name' => 'Create Make']);
	Permission::create(['name' => 'View Make']);
	Permission::create(['name' => 'Edit Make']);
	Permission::create(['name' => 'Delete Make']);

	Permission::create(['name' => 'Create Mechanic']);
	Permission::create(['name' => 'View Mechanic']);
	Permission::create(['name' => 'Edit Mechanic']);
	Permission::create(['name' => 'Delete Mechanic']);

	Permission::create(['name' => 'Create MechanicRequest']);
	Permission::create(['name' => 'View MechanicRequest']);
	Permission::create(['name' => 'Edit MechanicRequest']);
	Permission::create(['name' => 'Delete MechanicRequest']);

	Permission::create(['name' => 'Create Model']);
	Permission::create(['name' => 'View Model']);
	Permission::create(['name' => 'Edit Model']);
	Permission::create(['name' => 'Delete Model']);

	Permission::create(['name' => 'Create Order']);
	Permission::create(['name' => 'View Order']);
	Permission::create(['name' => 'Edit Order']);
	Permission::create(['name' => 'Delete Order']);

	Permission::create(['name' => 'Create OrderItem']);
	Permission::create(['name' => 'View OrderItem']);
	Permission::create(['name' => 'Edit OrderItem']);
	Permission::create(['name' => 'Delete OrderItem']);

	Permission::create(['name' => 'Create Product']);
	Permission::create(['name' => 'View Product']);
	Permission::create(['name' => 'Edit Product']);
	Permission::create(['name' => 'Delete Product']);

	Permission::create(['name' => 'Create Rider']);
	Permission::create(['name' => 'View Rider']);
	Permission::create(['name' => 'Edit Rider']);
	Permission::create(['name' => 'Delete Rider']);

	Permission::create(['name' => 'Create SpareRequest']);
	Permission::create(['name' => 'View SpareRequest']);
	Permission::create(['name' => 'Edit SpareRequest']);
	Permission::create(['name' => 'Delete SpareRequest']);

	Permission::create(['name' => 'Create SubCategory']);
	Permission::create(['name' => 'View SubCategory']);
	Permission::create(['name' => 'Edit SubCategory']);
	Permission::create(['name' => 'Delete SubCategory']);

	Permission::create(['name' => 'Create User']);
	Permission::create(['name' => 'View User']);
	Permission::create(['name' => 'Edit User']);
	Permission::create(['name' => 'Delete User']);
	// Permission::create(['name' => 'Create BaseRate']);

    }
}
