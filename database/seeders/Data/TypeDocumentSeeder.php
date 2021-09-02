<?php

namespace Database\Seeders\Data;

use App\Models\Data\TypeDocument;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

/**
 * Class TypeDocumentSeeder.
 */
class TypeDocumentSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        TypeDocument::create([
            'name' => 'biography',
            'label' => 'Biography',
            'key' => 'biography'
        ]);

        TypeDocument::create([
            'name' => 'excerpt of rank decree',
            'label' => 'Excerpt of Rank Decree',
            'key' => 'excerpt_of_rank_decree'
        ]);

        TypeDocument::create([
            'name' => 'family card',
            'label' => 'Family Card',
            'key' => 'family_card'
        ]);

        TypeDocument::create([
            'name' => 'army headquarters position decree',
            'label' => 'Army Headquarters Position Decree',
            'key' => 'army_headquarters_position_decree'
        ]);

        TypeDocument::create([
            'name' => 'certificate of birth',
            'label' => 'Certificate of Birth',
            'key' => 'certificate_of_birth'
        ]);

        TypeDocument::create([
            'name' => 'specialization development education certificate',
            'label' => 'Specialization Development Education Certificate',
            'key' => 'specialization_development_education_certificate'
        ]);

        TypeDocument::create([
            'name' => 'npwp card',
            'label' => 'Taxpayer Card Number',
            'key' => 'npwp_card'
        ]);

        TypeDocument::create([
            'name' => 'tik card',
            'label' => 'Information Technology and Communication Card',
            'key' => 'tik_card'
        ]);

        TypeDocument::create([
            'name' => 'military headquarters position decree',
            'label' => 'Military Headquarters Position Decree',
            'key' => 'military_headquarters_position_decree'
        ]);

        TypeDocument::create([
            'name' => 'inpassing',
            'label' => 'Inpassing',
            'key' => 'inpassing'
        ]);

        TypeDocument::create([
            'name' => 'asabri card',
            'label' => 'Indonesian Armed Forces Social Insurance Card',
            'key' => 'asabri_card'
        ]);

        TypeDocument::create([
            'name' => 'satya badge award',
            'label' => 'Satya Badge Award',
            'key' => 'satya_badge_award'
        ]);

        TypeDocument::create([
            'name' => 'other',
            'label' => 'Other',
            'key' => 'other'
        ]);

        $this->enableForeignKeys();
    }
}
