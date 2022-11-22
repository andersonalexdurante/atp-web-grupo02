<?php

namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
 
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'password' => Hash::make('password'),
            'email' => Str::random(10).'@gmail.com',
            'phone' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => Str::random(10),
            'password' => Hash::make('password'),
            'email' => Str::random(10).'@gmail.com',
            'phone' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('items')->insert([
            'name' => Str::random(10),
            'returned' => false,
            'idReceiver' => 1,
            'idOwner' => 2,
            'dateReturnForecast' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
