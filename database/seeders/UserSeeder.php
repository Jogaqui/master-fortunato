<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Josue Gabriel',
            'email' => 'josue@gmail.com',
        ])->assignRole('Administrador');
        User::factory()->create([
            'name' => 'Jack Edinson',
            'email' => 'jack@gmail.com',
        ])->assignRole('Mozo');
        User::factory()->create([
            'name' => 'Edward Steven',
            'email' => 'edward@gmail.com',
        ])->assignRole('Cocinero');
        User::factory()->create([
            'name' => 'Joan Antony',
            'email' => 'joan@gmail.com',
        ])->assignRole('Cajero');
    }
}
