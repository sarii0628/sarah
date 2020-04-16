<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $param = [
            'name' => 'pink',
            'code' => '#ff69b4',
        ];
        DB::table('colors')->insert($param);

        $param = [
            'name' => 'blue',
            'code' => '#0000ff',
        ];
        DB::table('colors')->insert($param);

        $param = [
            'name' => 'lightblue',
            'code' => '#add8e6',
        ];
        DB::table('colors')->insert($param);

        $param = [
            'name' => 'white',
            'code' => '#ffffff',
        ];
        DB::table('colors')->insert($param);

        $param = [
            'name' => 'navy',
            'code' => '#000080',
        ];
        DB::table('colors')->insert($param);

        $param = [
            'name' => 'green',
            'code' => '#008000',
        ];
        DB::table('colors')->insert($param);

        $param = [
            'name' => 'red',
            'code' => '#ff0000',
        ];
        DB::table('colors')->insert($param);

        $param = [
            'name' => 'gold',
            'code' => '#ffd700',
        ];
        DB::table('colors')->insert($param);

        $param = [
            'name' => 'silver',
            'code' => 'c0c0c0',
        ];
        DB::table('colors')->insert($param);

        $param = [
            'name' => 'orange',
            'code' => '#ffa500',
        ];
        DB::table('colors')->insert($param);
    }
}
