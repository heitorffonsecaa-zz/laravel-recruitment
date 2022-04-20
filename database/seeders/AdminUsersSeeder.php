<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'uuid' => Str::uuid(),
                'first_name' => 'Heitor',
                'last_name'  => 'Fonseca',
                'birthdate' => '1998-05-30',
                'gender' => 'male',
                'email' => 'admin@admin.com.br',
                'password' => Hash::make('admin123'),
                'role_id' => Role::where('slug', 'admin')->first()->id
            ]
        ];

        foreach ($users as $user){
            User::create($user);
        }
    }
}
