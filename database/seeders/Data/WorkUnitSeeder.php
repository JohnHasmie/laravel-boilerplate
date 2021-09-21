<?php

namespace Database\Seeders\Data;

use App\Models\Data\WorkUnit;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

/**
 * Class WorkUnitSeeder.
 */
class WorkUnitSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        WorkUnit::create([
            'name' => 'work unit 1',
            'label' => 'Work Unit 1',
        ]);

        WorkUnit::create([
            'name' => 'work unit 2',
            'label' => 'Work Unit 2',
        ]);

        $this->enableForeignKeys();
    }
}
