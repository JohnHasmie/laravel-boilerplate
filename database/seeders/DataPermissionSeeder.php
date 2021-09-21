<?php

namespace Database\Seeders;

use App\Domains\Auth\Models\Permission;
use App\Domains\Auth\Models\User;
use Database\Seeders\Data\CorpsPermissionSeeder;
use Database\Seeders\Data\DivisionPermissionSeeder;
use Database\Seeders\Data\PositionPermissionSeeder;
use Database\Seeders\Data\RankPermissionSeeder;
use Database\Seeders\Data\WorkUnitPermissionSeeder;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

/**
 * Class PermissionRoleTableSeeder.
 */
class DataPermissionSeeder extends Seeder
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
        Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.access.data',
            'description' => 'Data Permissions',
        ]);

        // $this->call(DivisionPermissionSeeder::class);
        $this->call(CorpsPermissionSeeder::class);
        $this->call(RankPermissionSeeder::class);
        $this->call(PositionPermissionSeeder::class);
        $this->call(WorkUnitPermissionSeeder::class);

        // Assign Permissions to other Roles
        //

        $this->enableForeignKeys();
    }
}
