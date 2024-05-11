<?php

namespace Database\Seeders;
use App\Models\Usuario;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ContadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contadorRole = Role::create(['name' => 'contador']);

        $contador1 = Usuario::create([
            'email' => 'contador1@gmail.com',
            'password' => Hash::make('contador1@gmail.com'),
        ]);
        $contador1->roles()->attach([$contadorRole->id]); // Asignar un solo rol
    }
}