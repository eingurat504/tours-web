<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        $user = new User();
        // $user->first_name = 'Super';
        $user->name = ' Super Admin';
        $user->email = 'superadmin@admin.com';
        $user->email_verified_at = date('Y-m-d H:i:s');
        $user->password = Hash::make('12345678');
        $user->save();
    }
}
