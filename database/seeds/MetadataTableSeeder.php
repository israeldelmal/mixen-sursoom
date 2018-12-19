<?php

use Illuminate\Database\Seeder;

class MetadataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('metadata')->insert([
            'ss_title'         => 'Sursoom',
            'ss_description'   => '#',
            'ss_keywords'      => '#',
            'gba_title'        => 'GBA',
            'gba_description'  => '#',
            'gba_keywords'     => '#',
            'odoo_title'       => 'Odoo',
            'odoo_description' => '#',
            'odoo_keywords'    => '#',
            'created_at'       => date("Y-m-d H:i:s"),
            'updated_at'       => date("Y-m-d H:i:s")
        ]);
    }
}
