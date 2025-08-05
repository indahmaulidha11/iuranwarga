<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DuesCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('dues_categories')->insert([
            ['period' => 'mingguan', 'nominal' => 10000, 'status' => true],
            ['period' => 'bulanan', 'nominal' => 30000, 'status' => true],
            ['period' => 'tahunan', 'nominal' => 300000, 'status' => true],
        ]);
    }

}
