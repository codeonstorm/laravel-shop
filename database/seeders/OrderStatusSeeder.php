<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('order_status')->insert([
        'status'=>'pending'
      ]);
      DB::table('order_status')->insert([
        'status'=>'failed'
      ]);
      DB::table('order_status')->insert([
        'status'=>'return'
      ]);
      DB::table('order_status')->insert([
        'status'=>'on-the-way'
      ]);
      DB::table('order_status')->insert([
        'status'=>'delivered'
      ]);
      DB::table('order_status')->insert([
        'status'=>'success'
      ]);
      DB::table('order_status')->insert([
        'status'=>'cancel'
      ]);
    }
}
