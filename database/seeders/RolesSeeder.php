<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'Administrador',
                'slug' => 'admin'
            ],
            [
                'name' => 'Candidato',
                'slug' => 'candidate'
            ],
            [
                'name' => 'Recrutador',
                'slug' => 'recruiter'
            ]
        ];

        foreach ($roles as $role){
            Role::create($role);
        }
    }
}
