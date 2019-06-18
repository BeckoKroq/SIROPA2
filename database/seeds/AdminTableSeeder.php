<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         DB::table('users')->insert([
             'nombre'=>'Super Admin',
             'clave_fun'=>'0',
             'email'=>'admin@gmail.com',
             'password'=>bcrypt('1234'),
             'telefono'=>'1234567890',
             'direccion'=>'admin',
             'region'=>'0',
             'municipio'=>'Zacatecas',
             'puesto'=>'Función Pública'

         ]);

         DB::table('users')->insert([
             'nombre'=>'Contralor',
             'clave_fun'=>'1',
             'email'=>'contralor@gmail.com',
             'password'=>bcrypt('1234'),
             'telefono'=>'1234567890',
             'direccion'=>'cont',
             'region'=>'5',
             'municipio'=>'28',
             'puesto'=>'Contralor'

         ]);

         DB::table('users')->insert([
             'nombre'=>'Obras Publicas',
             'clave_fun'=>'2',
             'email'=>'op@gmail.com',
             'password'=>bcrypt('1234'),
             'telefono'=>'1234567890',
             'direccion'=>'op',
             'region'=>'5',
             'municipio'=>'28',
             'puesto'=>'Obra Pública'

         ]);
     }
 }
