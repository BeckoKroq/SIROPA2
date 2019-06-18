<?php

use Illuminate\Database\Seeder;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            'region'=>'01',
        ]);

        DB::table('regions')->insert([
            'region'=>'02',
        ]);

        DB::table('regions')->insert([
            'region'=>'03',
        ]);

        DB::table('regions')->insert([
            'region'=>'04',
        ]);

        DB::table('regions')->insert([
            'region'=>'05',
        ]);

        DB::table('regions')->insert([
            'region'=>'06',
        ]);

        DB::table('regions')->insert([
            'region'=>'07',
        ]);

        DB::table('regions')->insert([
            'region'=>'08',
        ]);

        DB::table('regions')->insert([
            'region'=>'09',
        ]);

        DB::table('regions')->insert([
            'region'=>'10',
        ]);
    }
}
