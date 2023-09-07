<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::whereRole('siswa')->delete();
        // DB::table('users')->where('role', 'admin')->where('name', '!=', 'Admin')->delete();
        // \App\Models\User::factory(100)->create();

        // \App\Models\User::factory(100)->create();

        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
            'gender' => 'L',
            'role' => 'admin'
        ]);
        // \App\Models\User::create([
        //     'name' => 'Admin Rifki',
        //     'email' => 'rifki@gmail.com',
        //     'password' => bcrypt('123'),
        //     'gender' => 'L',
        //     'role' => 'admin'
        // ]);
        // \App\Models\User::create([
        //     'name' => 'Admin Lala',
        //     'email' => 'lala@gmail.com',
        //     'password' => bcrypt('123'),
        //     'gender' => 'P',
        //     'role' => 'admin'
        // ]);
        // \App\Models\User::create([
        //     'name' => 'Admin Anggi',
        //     'email' => 'anggi@gmail.com',
        //     'password' => bcrypt('123'),
        //     'gender' => 'P',
        //     'role' => 'admin'
        // ]);

        // \App\Models\Setting::create([
        //     'school_name' => 'SMKN 5 Kab. Tangerang',
        //     'headmaster' => 'Surta Wijaya, S.Kom. M.M',
        //     'email' => 'contact@smkn5kabtangerang.sch.id',
        //     'phone' => '(021) 59330830',
        //     'address' => 'Jln. IR. Sutami KM.1,2 Desa. Mauk Barat, Kec. Mauk Tangerang Banten',
        // ]);
    }
}
