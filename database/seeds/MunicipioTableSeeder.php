<?php

use Illuminate\Database\Seeder;

class MunicipioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         //Municipios Region 01
         DB::table('municipios')->insert([
             'municipio'=>'Gral. Enrique Estrada',
             'region_id'=>'1'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Villa de Cos',
             'region_id'=>'1'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Calera de Víctor Rosales',
             'region_id'=>'1'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Valparaíso',
             'region_id'=>'1'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Fresnillo',
             'region_id'=>'1'
         ]);
         //------------------------------------------------------------------

         //Municipios Region 02
         DB::table('municipios')->insert([
             'municipio'=>'Cañitas de F. P.',
             'region_id'=>'2'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Gral. Fco. R. Murguía',
             'region_id'=>'2'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Juan Aldama',
             'region_id'=>'2'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Miguel Auza',
             'region_id'=>'2'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Río Grande',
             'region_id'=>'2'
         ]);
         //------------------------------------------------------------------

         //Municipios Region 03
         DB::table('municipios')->insert([
             'municipio'=>'Chalchihuites',
             'region_id'=>'3'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Jiménez del Teúl',
             'region_id'=>'3'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Saín Alto',
             'region_id'=>'3'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Sombrerete',
             'region_id'=>'3'
         ]);
         //------------------------------------------------------------------

         //Municipios Region 04
         DB::table('municipios')->insert([
             'municipio'=>'Loreto',
             'region_id'=>'4'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Noria de Ángeles',
             'region_id'=>'4'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Villa García',
             'region_id'=>'4'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Villa Hidalgo',
             'region_id'=>'4'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Villa Gonzáles Ortega',
             'region_id'=>'4'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Pinos',
             'region_id'=>'4'
         ]);
         //------------------------------------------------------------------

         //Municipios Region 05
         DB::table('municipios')->insert([
             'municipio'=>'Atolinga',
             'region_id'=>'5'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Florencia de Benito Juárez',
             'region_id'=>'5'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'García de la Cadena',
             'region_id'=>'5'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Momax',
             'region_id'=>'5'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Tepechitlán',
             'region_id'=>'5'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Teúl de Gonzáles Ortega',
             'region_id'=>'5'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Santa María de La Paz',
             'region_id'=>'5'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Tlaltenango',
             'region_id'=>'5'
         ]);
         //------------------------------------------------------------------

         //Municipios Region 06
         DB::table('municipios')->insert([
             'municipio'=>'Gral. Joaquín Amaro',
             'region_id'=>'6'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Tepetongo',
             'region_id'=>'6'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Susticacán',
             'region_id'=>'6'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Monte Escobedo',
             'region_id'=>'6'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Villanueva',
             'region_id'=>'6'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Jerez de García Salinas',
             'region_id'=>'6'
         ]);
         //------------------------------------------------------------------

         //Municipios Region 07
         DB::table('municipios')->insert([
             'municipio'=>'El Salvador',
             'region_id'=>'7'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Mazapil',
             'region_id'=>'7'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Melchor Ocampo',
             'region_id'=>'7'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Concepción del Oro',
             'region_id'=>'7'
         ]);
         //------------------------------------------------------------------

         //Municipios Region 08
         DB::table('municipios')->insert([
             'municipio'=>'Cuauhtémoc',
             'region_id'=>'8'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Genaro Codina',
             'region_id'=>'8'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Morelos',
             'region_id'=>'8'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Pánuco',
             'region_id'=>'8'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Vetagrande',
             'region_id'=>'8'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Zacatecas',
             'region_id'=>'8'
         ]);
         //------------------------------------------------------------------

         //Municipios Region 09
         DB::table('municipios')->insert([
             'municipio'=>'Apozol',
             'region_id'=>'9'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Apulco',
             'region_id'=>'9'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Huanusco',
             'region_id'=>'9'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Jalpa',
             'region_id'=>'9'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Mezquital del Oro',
             'region_id'=>'9'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Moyahua de Estrada',
             'region_id'=>'9'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Nochistlán de Mejía',
             'region_id'=>'9'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Tabasco',
             'region_id'=>'9'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Juchipila',
             'region_id'=>'9'
         ]);
         //------------------------------------------------------------------

         //Municipios Region 10
         DB::table('municipios')->insert([
             'municipio'=>'Gral. Pánfilo Natera',
             'region_id'=>'10'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Luis Moya',
             'region_id'=>'10'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Ojocaliente',
             'region_id'=>'10'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Guadalupe',
             'region_id'=>'10'
         ]);

         DB::table('municipios')->insert([
             'municipio'=>'Trancoso',
             'region_id'=>'10'
         ]);
         //------------------------------------------------------------------
     }
 }
