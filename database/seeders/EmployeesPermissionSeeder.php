<?php

namespace Database\Seeders;

use Database\Seeders\Employee\PersipPermissionSeeder;
use Database\Seeders\Employee\PersmilPermissionSeeder;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

/**
 * Class PermissionRoleTableSeeder.
 */
class EmployeesPermissionSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        $this->call(PersipPermissionSeeder::class);
        $this->call(PersmilPermissionSeeder::class);

        // Assign Permissions to other Roles
        //

        $this->enableForeignKeys();
    }
}
