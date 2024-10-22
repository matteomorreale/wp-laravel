<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'amministratore']);
        Role::create(['name' => 'editore']);
        Role::create(['name' => 'autore']);
        Role::create(['name' => 'collaboratore']);
        Role::create(['name' => 'sottoscrittore']);
    }
}
