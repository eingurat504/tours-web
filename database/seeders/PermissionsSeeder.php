<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        
        \DB::table('permissions')->delete();

        \DB::table('permissions')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'View Users',
                'guard_name' => 'web',
                'created_at' => '2018-11-14 13:35:58',
                'updated_at' => '2018-11-14 13:35:58',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Create Users',
                'guard_name' => 'web',
                'created_at' => '2018-11-14 13:44:23',
                'updated_at' => '2018-11-14 13:44:23',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Update Users',
                'guard_name' => 'web',
                'created_at' => '2018-11-14 13:45:07',
                'updated_at' => '2018-11-14 13:45:07',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Delete Users',
                'guard_name' => 'web',
                'created_at' => '2018-11-14 14:09:52',
                'updated_at' => '2018-11-14 14:09:52',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'View Activities',
                'guard_name' => 'web',
                'created_at' => '2018-11-14 14:09:52',
                'updated_at' => '2018-11-14 14:09:52',
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'Create Activities',
                'guard_name' => 'web',
                'created_at' => '2018-11-14 14:09:52',
                'updated_at' => '2018-11-14 14:09:52',
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'Update Activities',
                'guard_name' => 'web',
                'created_at' => '2018-11-14 14:09:52',
                'updated_at' => '2018-11-14 14:09:52',
            ),
            7 =>
            array (
                'id' => 8,
                'name' => 'Delete Activities',
                'guard_name' => 'web',
                'created_at' => '2018-11-14 14:09:52',
                'updated_at' => '2018-11-14 14:09:52',
            ),
            8 =>
            array (
                'id' => 9,
                'name' => 'View Bookings',
                'guard_name' => 'web',
                'created_at' => '2018-11-14 14:09:52',
                'updated_at' => '2018-11-14 14:09:52',
            ),
            9 =>
            array (
                'id' => 10,
                'name' => 'Create Bookings',
                'guard_name' => 'web',
                'created_at' => '2018-11-14 14:09:52',
                'updated_at' => '2018-11-14 14:09:52',
            ),
            10 =>
            array (
                'id' => 11,
                'name' => 'Confirm Bookings',
                'guard_name' => 'web',
                'created_at' => '2018-11-14 14:09:52',
                'updated_at' => '2018-11-14 14:09:52',
            ),
            11 =>
            array (
                'id' => 12,
                'name' => 'Update Bookings',
                'guard_name' => 'web',
                'created_at' => '2018-11-14 14:09:52',
                'updated_at' => '2018-11-14 14:09:52',
            ),
            12 =>
            array (
                'id' => 13,
                'name' => 'View Payments',
                'guard_name' => 'web',
                'created_at' => '2018-11-14 14:09:52',
                'updated_at' => '2018-11-14 14:09:52',
            ), 
            13 =>
            array (
                'id' => 14,
                'name' => 'View Permissions',
                'guard_name' => 'web',
                'created_at' => '2023-03-19 16:48:44',
                'updated_at' => '2023-03-19 16:48:44',
            ),
            14 =>
            array (
                'id' => 15,
                'name' => 'Create Permissions',
                'guard_name' => 'web',
                'created_at' => '2023-03-19 16:48:44',
                'updated_at' => '2023-03-19 16:48:44',
            ),
            15 =>
            array (
                'id' => 16,
                'name' => 'Update Permissions',
                'guard_name' => 'web',
                'created_at' => '2023-03-19 16:48:44',
                'updated_at' => '2023-03-19 16:48:44',
            ),
            16 =>
            array (
                'id' => 17,
                'name' => 'Sync-Permissions Roles',
                'guard_name' => 'web',
                'created_at' => '2023-03-19 16:48:44',
                'updated_at' => '2023-03-19 16:48:44',
            ),
            17 =>
            array (
                'id' => 18,
                'name' => 'Delete Permissions',
                'guard_name' => 'web',
                'created_at' => '2023-03-19 16:48:44',
                'updated_at' => '2023-03-19 16:48:44',
            ),  
            18 =>
            array (
                'id' => 19,
                'name' => 'Cancel Bookings',
                'guard_name' => 'web',
                'created_at' => '2023-03-19 16:48:44',
                'updated_at' => '2023-03-19 16:48:44',
            ),
          
        ));

  
    }
}
