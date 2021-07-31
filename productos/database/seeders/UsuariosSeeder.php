<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Cristian Sánchez',
            'email'=> 'crisanbed@gmail.com',
            'password'=>Hash::make('acorazado'),
            'created_at' => date('y-m-d H:m:s'),
            'updated_at' => date('y-m-d H:m:s')
        ]);

        DB::table('users')->insert([
            'name'=>'Juan Perez',
            'email'=> 'juanperez@gmail.com',
            'password'=>Hash::make('password'),
            'created_at' => date('y-m-d H:m:s'),
            'updated_at' => date('y-m-d H:m:s')
        ]);
    }
}
