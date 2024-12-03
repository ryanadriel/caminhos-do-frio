<?php

namespace Database\Seeders;

use App\Models\acl\Permission;
use App\Models\acl\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Roles
        $developer = Role::create(['name' => 'developer', 'label' => 'Desenvolvedor']);
        $client = Role::create(['name' => 'client', 'label' => 'Cliente']);
        $company = Role::create(['name' => 'company', 'label' => 'Empresa']);

        // Permissions
        $permissions = [
          ['name' => 'manage-reservations', 'label' => 'Gerenciar Reservas'],
          ['name' => 'view-own-reservations', 'label' => 'Visualizar Reservas Próprias'],
        ];

        foreach ($permissions as $perm) {
            $permission = Permission::create($perm);

            if($perm['name'] === 'manage-reservations') {
                $permission->roles()->attach($developer->id);
                $permission->roles()->attach($company->id);
            } elseif ($perm['name'] === 'view-own-reservations') {
                $permission->roles()->attach($client->id);
            }
        }
    }
}
