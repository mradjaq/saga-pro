<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('level')->insert([
            [
                'id' => 1,
                'level' => 'Admin'
            ],
            [
                'id' => 2,
                'level' => 'Author'
            ],
        ]);
    }
}
