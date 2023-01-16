<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 =  Role::create(['name' => 'Administrador']);
        $role2 =  Role::create(['name' => 'Mozo']);
        $role3 =  Role::create(['name' => 'Cocinero']);
        $role4 =  Role::create(['name' => 'Cajero']);
        Permission::create(['name' => 'admin.mesas.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categorias.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.comidas.index'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'admin.clientes.index'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'admin.comandas.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.pedidos.index'])->syncRoles([$role1, $role2, $role4]);
        
    }
}
