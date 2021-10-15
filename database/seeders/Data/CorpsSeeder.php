<?php

namespace Database\Seeders\Data;

use App\Models\Data\Corps;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

/**
 * Class DivisionSeeder.
 */
class CorpsSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        Corps::create([
            'name' => 'corps 1',
            'label' => 'Corps 1',
        ]);

        Corps::create([
            'name' => 'corps 2',
            'label' => 'Corps 2',
        ]);

        Corps::create([
            'name' => 'corps 3',
            'label' => 'Corps 3',
        ]);

        $this->enableForeignKeys();
    }
}
