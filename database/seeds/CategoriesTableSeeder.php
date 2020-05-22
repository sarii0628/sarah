<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
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
            'name' => 'ポーチ',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'name' => '小物',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'name' => 'アクセサリー',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'name' => 'タオル・ハンカチ',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'name' => 'ベビー用品',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'name' => 'バッグ・手提げ',
        ];
        DB::table('categories')->insert($param);

    }
}
