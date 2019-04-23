<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PerpetratorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perpetrators')->insert(
            [
                [
                    'name' => 'Ringostat',
                    'created_at' => Carbon::now(),
                ],
                [
                    'name' => 'Vendor',
                    'created_at' => Carbon::now(),
                ]
            ]
        );
    }
}
