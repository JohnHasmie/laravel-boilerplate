<?php

namespace Database\Seeders\Employee;

use App\Domains\Auth\Models\Permission;
use App\Domains\Auth\Models\User;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

/**
 * Class PermissionRoleTableSeeder.
 */
class PersmilPermissionSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Grouped permissions
        // Users category
        $users = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.access.persmil',
            'description' => 'All Persmil Permissions',
        ]);

        $users->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.persmil.list',
                'description' => 'View Persmils',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.persmil.create',
                'description' => 'Create Persmils',
                'sort' => 2,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.persmil.update',
                'description' => 'Update Persmils',
                'sort' => 3,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.persmil.delete',
                'description' => 'Delete Persmils',
                'sort' => 4,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.persmil.show',
                'description' => 'Show Persmils',
                'sort' => 5,
            ])
        ]);

        // Assign Permissions to other Roles
        //

        $this->enableForeignKeys();
    }
}
