<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->username = 'Jonathan_User';
        $user->first_name = 'Jonathan';
        $user->last_name = 'User';
        $user->email = 'jonathan@user.com';
        $user->password = Hash::make('passworduser');
        $user->email_verified_at = '2021-05-01 05:46:03';
        $user->is_admin = '0';
        $user->save();

        $user = new User();
        $user->username = 'Ardian_User';
        $user->first_name = 'Ardian';
        $user->last_name = 'User';
        $user->email = 'ardian@user.com';
        $user->password = Hash::make('passworduser');
        $user->email_verified_at = '2021-05-01 05:46:03';
        $user->is_admin = '0';
        $user->save();

        $user = new User();
        $user->username = 'Aldi_User';
        $user->first_name = 'Aldi';
        $user->last_name = 'User';
        $user->email = 'aldi@user.com';
        $user->password = Hash::make('passworduser');
        $user->email_verified_at = '2021-05-01 05:46:03';
        $user->is_admin = '0';
        $user->save();

        $user = new User();
        $user->username = 'Bryan_User';
        $user->first_name = 'Bryan';
        $user->last_name = 'User';
        $user->email = 'bryan@user.com';
        $user->password = Hash::make('passworduser');
        $user->email_verified_at = '2021-05-01 05:46:03';
        $user->is_admin = '0';
        $user->save();

        $user = new User();
        $user->username = 'Jonathan_Admin';
        $user->first_name = 'Jonathan';
        $user->last_name = 'Admin';
        $user->email = 'jonathan@admin.com';
        $user->password = Hash::make('passwordadmin');
        $user->email_verified_at = '2021-05-01 05:46:03';
        $user->is_admin = '1';
        $user->save();

        $user = new User();
        $user->username = 'Ardian_Admin';
        $user->first_name = 'Ardian';
        $user->last_name = 'Admin';
        $user->email = 'ardian@admin.com';
        $user->password = Hash::make('passwordadmin');
        $user->email_verified_at = '2021-05-01 05:46:03';
        $user->is_admin = '1';
        $user->save();

        $user = new User();
        $user->username = 'Aldi_Admin';
        $user->first_name = 'Aldi';
        $user->last_name = 'Admin';
        $user->email = 'aldi@admin.com';
        $user->password = Hash::make('passwordadmin');
        $user->email_verified_at = '2021-05-01 05:46:03';
        $user->is_admin = '1';
        $user->save();

        $user = new User();
        $user->username = 'Bryan_Admin';
        $user->first_name = 'Bryan';
        $user->last_name = 'Amdin';
        $user->email = 'bryan@admin.com';
        $user->password = Hash::make('passwordadmin');
        $user->email_verified_at = '2021-05-01 05:46:03';
        $user->is_admin = '1';
        $user->save();

        // $user = new User();
        // $user->username = 'sirjvp';
        // $user->first_name = 'Jonathan';
        // $user->last_name = 'Furry';
        // $user->email = 'secondaryjvp@gmail.com';
        // $user->password = Hash::make('12345678');
        // $user->email_verified_at = '2021-05-01 05:46:03';
        // $user->is_admin = '0';
        // $user->save();

        // $user = new User();
        // $user->username = 'sirjvpa';
        // $user->first_name = 'Jonathan';
        // $user->last_name = 'Furry';
        // $user->email = 'jonathanprawira.almaz@gmail.com';
        // $user->password = Hash::make('12345678');
        // $user->email_verified_at = '2021-05-01 05:46:03';
        // $user->is_admin = '0';
        // $user->save();

        // $user = new User();
        // $user->username = 'sirjvpb';
        // $user->first_name = 'Jonathan';
        // $user->last_name = 'Furry';
        // $user->email = 'blackluminate@gmail.com';
        // $user->password = Hash::make('12345678');
        // $user->email_verified_at = '2021-05-01 05:46:03';
        // $user->is_admin = '0';
        // $user->save();

        // $user = new User();
        // $user->username = 'sirjvpc';
        // $user->first_name = 'Jonathan';
        // $user->last_name = 'Furry';
        // $user->email = 'jonathanvalentinoprawira123@gmail.com';
        // $user->password = Hash::make('12345678');
        // $user->email_verified_at = '2021-05-01 05:46:03';
        // $user->is_admin = '0';
        // $user->save();

        // $user = new User();
        // $user->username = 'sirjvpd';
        // $user->first_name = 'Jonathan';
        // $user->last_name = 'Furry';
        // $user->email = 'vleonard@student.ciputra.ac.id';
        // $user->password = Hash::make('12345678');
        // $user->email_verified_at = '2021-05-01 05:46:03';
        // $user->is_admin = '0';
        // $user->save();


    }
}
