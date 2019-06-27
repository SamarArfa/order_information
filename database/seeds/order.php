<?php

use Illuminate\Database\Seeder;

class order extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'user_id' =>'1',
            'status' =>true,
            'item_id' => 1,
            'qty' => '10 لتر ',
//            'total' => '3'
        ]);
        DB::table('orders')->insert([
            'user_id' =>'1',
            'status' => true,
            'item_id' => 1,
            'qty' => '10 لتر ',
//            'total' => '3'
        ]);
        DB::table('orders')->insert([
            'user_id' =>'2',
            'status' => false,
            'item_id' => 2,
            'qty' => ' 1000 شيكل',
//            'total' => '3'
        ]);

    }
}
