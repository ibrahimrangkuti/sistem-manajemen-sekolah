<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // \App\Models\Student::factory(30)->create();

        \App\Models\Setting::create([
            'school_name' => 'SMKN 5 Kab. Tangerang',
            'headmaster' => 'Surta Wijaya, S.Kom. M.M',
            'phone' => '(021) 59330830',
            'address' => 'Jln. IR. Sutami KM.1,2 Desa. Mauk Barat, Kec. Mauk Tangerang Banten',cl
        ]);
    }
}
