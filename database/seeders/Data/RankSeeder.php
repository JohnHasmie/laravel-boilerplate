<?php

namespace Database\Seeders\Data;

use App\Models\Data\Rank;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

/**
 * Class RankSeeder.
 */
class RankSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        Rank::create([
            'name' => 'rank 1',
            'label' => 'Rank 1',
        ]);

        Rank::create([
            'name' => 'rank 2',
            'label' => 'Rank 2',
        ]);

        $this->enableForeignKeys();
    }
}
