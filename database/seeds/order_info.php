<?php

use Illuminate\Database\Seeder;

class order_info extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' =>'محمد رياض خضر',
            'status' =>false,
            'fuel' => 'سولار',
            'qty' => '10 لتر ',
            'total' => '3'
        ]);
        DB::table('users')->insert([
            'name' =>'محمد رياض خضر',
            'status' => false,
            'fuel' => 'سولار',
            'qty' => '10 لتر ',
            'total' => '3'
        ]);
        DB::table('users')->insert([
            'name' =>'أيمن محمد الديراوي',
            'status' => false,
            'fuel' => 'بنزين',
            'qty' => '1000شيكل ',
            'total' => '3'
        ]);

    }
}
