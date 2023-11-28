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
                'name' => 'ViewSystemLogs',
                'guard_name' => 'web',
                'created_at' => '2018-11-14 13:35:58',
                'updated_at' => '2018-11-14 13:35:58',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'ManageSystemBackups',
                'guard_name' => 'web',
                'created_at' => '2018-11-14 13:44:23',
                'updated_at' => '2018-11-14 13:44:23',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'ManagePermissions',
                'guard_name' => 'web',
                'created_at' => '2018-11-14 13:45:07',
                'updated_at' => '2018-11-14 13:45:07',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'ViewUsers',
                'guard_name' => 'web',
                'created_at' => '2018-11-14 14:09:52',
                'updated_at' => '2018-11-14 14:09:52',
            )
          
        ));

  
    }
}
