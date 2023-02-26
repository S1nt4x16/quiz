<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ss = 
        [
            [
                'subject' => "Matematika",
                'hours' => "2",
                "created_at"=> now()
            ],
            [
                'subject' => "Kimia",
                'hours' => "2",
                "created_at"=> now()
            ],
        ];

        DB::table('subjects')->insert($ss);;
    }
}
