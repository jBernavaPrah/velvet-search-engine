<?php

use Illuminate\Database\Seeder;

class WebsitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //path to sql file
        $sql = database_path('seeds/dump.sql');

        \Illuminate\Support\Facades\DB::unprepared(file_get_contents($sql));
    }
}
