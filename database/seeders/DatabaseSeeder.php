<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       User::create([
        'name' => 'Indah',
        'username' => 'indah',
        'password' => bcrypt('123'),
        'nohp' => '081234567890',
        'address' => 'salawu',
        'level' => 'admin',
    ]);
        User::create([
            'name' => 'Septi',
            'username' => 'septi',
            'password' => bcrypt('123'),
            'nohp' => '081234567890',
            'address' => 'singaparna',
            'level' => 'warga',
    ]);
        User::create([
            'name' => 'Himaya',
            'username' => 'himaya',
            'password' => bcrypt('123'),
            'nohp' => '081234567890',
            'address' => 'tasik',
            'level' => 'warga',
    ]);
        Officer::create([
            'name' => 'Bu RT',
            'position' => 'Ketua RT',
        ]);

        Officer::create([
            'name' => 'Bu RW',
            'position' => 'Ketua RW',
        ]);
        Officer::create([
            'name' => 'Bu Sekre',
            'position' => 'Sekretaris',
        ]);
        DuesCategory::create([
            'period' => 'bulanan',
            'nominal' => 10000,
            'status' => true,
        ]);

        DuesCategory::create([
            'period' => 'tahunan',
            'nominal' => 120000,
            'status' => true,
        ]);

        DuesCategory::create([
            'period' => 'mingguan',
            'nominal' => 2500,
            'status' => false,
        ]);

    }
}
