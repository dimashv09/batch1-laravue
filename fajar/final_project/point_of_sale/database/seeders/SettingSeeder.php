<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'id' => 1,
            'company_name' => 'safari',
            'address' => 'Jl.kebun Binatang',
            'phone_number' => '0897483634',
            'note_type' => 1,
            'discount' => 5,
            'logo_path' => 'img/logo.png',
            'card_path' => 'img/logo.png',
        ]);
    }
}
