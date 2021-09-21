<?php

namespace Database\Seeders\Auth;

use App\Domains\Auth\Models\Permission;
use App\Domains\Auth\Models\Role;
use App\Domains\Auth\Models\User;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

/**
 * Class AdminWorkUnitSeeder.
 */
class AdminWorkUnitSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Create Admin Work Unit Roles
        $role = Role::create([
            'id' => 2,
            'type' => User::TYPE_ADMIN,
            'name' => 'Admin Work Unit',
        ]);

        $permissions = Permission::whereIn('id', [1, 33, 39])->get();

        $role->syncPermissions($permissions);

        $this->enableForeignKeys();
    }
}
