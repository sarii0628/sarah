<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
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
            'name' => 'タオルハンカチ',
            'category_id' => '4',
            'price' => '525',
            'material' => 'コットン',
            'size_cm' => '25*25',
            'is_handmade' => True,
            'is_imported' => False,
            'description' => 'やさしい触り心地のタオルハンカチです。',
        ];

        DB::table('products')->insert($param);
    }
}
