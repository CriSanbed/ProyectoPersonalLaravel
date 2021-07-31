<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'nombre' => 'Perfumes',
            'created_at' => date('y-m-d H:m:s'),
            'updated_at' => date('y-m-d H:m:s'),
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'Maquillaje',
            'created_at' => date('y-m-d H:m:s'),
            'updated_at' => date('y-m-d H:m:s'),
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'Fragancias',
            'created_at' => date('y-m-d H:m:s'),
            'updated_at' => date('y-m-d H:m:s'),
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'Cuidado Personal',
            'created_at' => date('y-m-d H:m:s'),
            'updated_at' => date('y-m-d H:m:s'),
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'Bisuteria',
            'created_at' => date('y-m-d H:m:s'),
            'updated_at' => date('y-m-d H:m:s'),
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'Kids',
            'created_at' => date('y-m-d H:m:s'),
            'updated_at' => date('y-m-d H:m:s'),
        ]);


    }
}
