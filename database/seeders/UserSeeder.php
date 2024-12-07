<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $user->name = 'admin';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('password');
        $user->save();
        $user->assignRole('admin');
        $user = new User();
        $user->name = 'testuser';
        $user->email = 'test@gmail.com';
        $user->password = Hash::make('password');
        $user->save();
        $user->assignRole('user');
    }
}
