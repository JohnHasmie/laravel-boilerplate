<?php

namespace Database\Seeders;

use Database\Seeders\Data\CorpsSeeder;
use Database\Seeders\Data\DivisionSeeder;
use Database\Seeders\Data\PositionSeeder;
use Database\Seeders\Data\RankSeeder;
use Database\Seeders\Data\TypeDocumentSeeder;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder.
 */
class DatabaseSeeder extends Seeder
{
    use TruncateTable;

    /**
     * Seed the application's database.
     */
    public function run()
    {
        Model::unguard();

        $this->truncateMultiple([
            'activity_log',
            'failed_jobs',
        ]);

        $this->call(AuthSeeder::class);
        $this->call(AnnouncementSeeder::class);
        $this->call(DataPermissionSeeder::class);
        $this->call(EmployeesPermissionSeeder::class);

        $this->call(TypeDocumentSeeder::class);
        $this->call(DivisionSeeder::class);
        $this->call(CorpsSeeder::class);
        $this->call(RankSeeder::class);
        $this->call(PositionSeeder::class);

        Model::reguard();
    }
}
