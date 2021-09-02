<?php

namespace Database\Seeders\Data;

use App\Models\Data\Position;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

/**
 * Class PositionSeeder.
 */
class PositionSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        Position::create([
            'name' => 'position 1',
            'label' => 'Position 1',
        ]);

        Position::create([
            'name' => 'position 2',
            'label' => 'Position 2',
        ]);

        $this->enableForeignKeys();
    }
}
