<?php

use Illuminate\Database\Seeder;

class item extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'name' => 'سولار',

//            'price' => '100 '

        ]);

        DB::table('items')->insert([
            'name' => ' بنزين',

//            'price' => '20'
        ]);
    }
}
