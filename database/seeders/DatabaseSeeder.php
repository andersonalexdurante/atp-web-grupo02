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
        DB::table('usuario')->insert([
            'nome' => Str::random(10),
            'senha' => Hash::make('password'),
            'email' => Str::random(10).'@gmail.com',
            'telefone' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('usuario')->insert([
            'nome' => Str::random(10),
            'senha' => Hash::make('password'),
            'email' => Str::random(10).'@gmail.com',
            'telefone' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('item')->insert([
            'nome' => Str::random(10),
            'devolvido' => false,
            'emprestador_id' => 1,
            'dono_id' => 2,
            'emprestado_em' => now(),
            'previsto_devolucao_em' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
