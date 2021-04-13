<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	$role=Role::where('name','=','Admin')->first();
        DB::table('users')->insert([
            'name'=>'Suki Spares Admin',
			'phone'=>'+254727787878',
			'email'=>'admin@sukispares.com',
			'email_verified_at'=>date('Y-m-d H:i:s'),
			'password'=>Hash::make('#@sukispares101'),
			'is_admin'=>1,
			'role_id'=>$role->id
        ]);
        $user=User::find(1);
        $user->syncPermissions(['Create Banner', 'View Banner', 'Edit Banner', 'Delete Banner', 'Create Category', 'View Category', 'Edit Category', 'Delete Category', 'Create Coupon', 'View Coupon', 'Edit Coupon', 'Delete Coupon', 'Create Make', 'View Make', 'Edit Make', 'Delete Make', 'Create Mechanic', 'View Mechanic', 'Edit Mechanic', 'Delete Mechanic', 'Create MechanicRequest', 'View MechanicRequest', 'Edit MechanicRequest', 'Delete MechanicRequest', 'Create Model', 'View Model', 'Edit Model', 'Delete Model', 'Create Order', 'View Order', 'Edit Order', 'Delete Order', 'Create OrderItem', 'View OrderItem', 'Edit OrderItem', 'Delete OrderItem', 'Create Product', 'View Product', 'Edit Product', 'Delete Product', 'Create Rider', 'View Rider', 'Edit Rider', 'Delete Rider', 'Create SpareRequest', 'View SpareRequest', 'Edit SpareRequest', 'Delete SpareRequest', 'Create SubCategory', 'View SubCategory', 'Edit SubCategory', 'Delete SubCategory', 'Create User', 'View User', 'Edit User', 'Delete User']);
    }
}
