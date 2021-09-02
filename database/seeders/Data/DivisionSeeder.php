<?php

namespace Database\Seeders\Data;

use App\Models\Data\Division;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

/**
 * Class DivisionSeeder.
 */
class DivisionSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        Division::create([
            'name' => 'military',
            'label' => 'Military',
        ]);

        Division::create([
            'name' => 'civil',
            'label' => 'Civil',
        ]);

        $this->enableForeignKeys();
    }
}
