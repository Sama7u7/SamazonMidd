<?php

namespace Database\Seeders;
use App\Models\Usuario;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Crear algunos roles
        $clienteRole = Role::create(['name' => 'cliente']);
        $vendedorRole = Role::create(['name' => 'vendedor']);

        // Crear usuarios y asignarles roles
        $cliente1 = Usuario::create([
            'email' => 'cliente1@gmail.com',
            'password' => Hash::make('cliente1@gmail.com'),
        ]);
        $cliente1->roles()->attach([$clienteRole->id, $vendedorRole->id]); // Asignar múltiples roles

        $cliente2 = Usuario::create([
            'email' => 'cliente2@gmail.com',
            'password' => Hash::make('cliente2@gmail.com'),
        ]);
        
    }
}