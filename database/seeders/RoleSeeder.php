<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
          'rank'=>'super_admin'
        ]);
        DB::table('roles')->insert([
          'rank'=>'admin'
        ]);
        DB::table('roles')->insert([
          'rank'=>'user'
        ]);
    }
}
