<?php

use Illuminate\Database\Seeder;

class detail extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('details')->insert([
            'order_id' =>1,
            'item_id' => 1,
            'qty' => '10 لتر ',
            'total' => '3'
        ]);
        DB::table('details')->insert([
            'order_id' =>2,
            'item_id' => 1,
            'qty' => '10 لتر ',
            'total' => '3'
        ]);
        DB::table('details')->insert([
            'order_id' =>3,
            'item_id' => 2,
            'qty' => ' 1000 شيكل',
            'total' => '3'
        ]);

    }
}
