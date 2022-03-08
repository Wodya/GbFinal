<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert(['id' => 1, 'name' => 'Богдасаров Олег', 'email' => 'wodya@wodya.ru', 'phone' => '+79151111111', 'password' => '$2y$10$BfJjfQInDWVV2W0VrXs90.Y847zsRY8KCWTpvTvFjSQ3ZTYzdTtH.']);

        DB::table('brand')->delete();
        DB::table('brand')->insert(['id' => 1, 'name' => 'ABS']);
        DB::table('brand')->insert(['id' => 2, 'name' => 'ASAM']);
        DB::table('brand')->insert(['id' => 3, 'name' => 'BOSCH']);

        DB::table('product')->delete();
        DB::table('product')->insert(['id' => 1, 'brand_id' => 1, 'code' => '123', 'name' => 'Тормозная жидкость', 'is_liquidity' => true, 'photo' => 'detail1']);
        DB::table('product')->insert(['id' => 2, 'brand_id' => 2, 'code' => '123', 'name' => 'Педаль газа', 'is_liquidity' => true, 'photo' => 'detail2']);
        DB::table('product')->insert(['id' => 3, 'brand_id' => 3, 'code' => '123', 'name' => 'Двигатель', 'is_liquidity' => false, 'photo' => 'detail3']);
        DB::table('product')->insert(['id' => 4, 'brand_id' => 1, 'code' => 'aaa', 'name' => 'Рычаг', 'is_liquidity' => true, 'photo' => 'detail4']);
        DB::table('product')->insert(['id' => 5, 'brand_id' => 1, 'code' => 'bbb', 'name' => 'Шаровая опора', 'is_liquidity' => false, 'photo' => 'detail5']);
        DB::table('product')->insert(['id' => 6, 'brand_id' => 1, 'code' => 'ccc', 'name' => 'Сиденье переднее правое', 'is_liquidity' => true, 'photo' => 'detail6']);

        DB::table('supplier')->delete();
        DB::table('supplier')->insert(['id' => 1, 'name' => 'Rolf', 'city' => 'МСК', 'success_percent' => 77, 'is_dialer' => true]);
        DB::table('supplier')->insert(['id' => 2, 'name' => 'Авто-японец', 'city' => 'ЧЕЛ', 'success_percent' => 90, 'is_dialer' => false]);
        DB::table('supplier')->insert(['id' => 3, 'name' => 'Звезда', 'city' => 'ЕКБ', 'success_percent' => 60, 'is_dialer' => false]);
        DB::table('supplier')->insert(['id' => 4, 'name' => 'Авто-империя', 'city' => 'МСК', 'success_percent' => 98, 'is_dialer' => true]);

        DB::table('offer')->delete();
        DB::table('offer')->insert(['id' => 1, 'product_id' => 1, 'supplier_id' => 1, 'period_min' => 1, 'period_max' => 3, 'price' => 1020]);
        DB::table('offer')->insert(['id' => 2, 'product_id' => 1, 'supplier_id' => 2, 'period_min' => 2, 'period_max' => 3, 'price' => 920]);
        DB::table('offer')->insert(['id' => 3, 'product_id' => 1, 'supplier_id' => 2, 'period_min' => 0, 'period_max' => 1, 'price' => 2020]);
        DB::table('offer')->insert(['id' => 4, 'product_id' => 1, 'supplier_id' => 3, 'period_min' => 1, 'period_max' => 3, 'price' => 1420]);
        DB::table('offer')->insert(['id' => 5, 'product_id' => 1, 'supplier_id' => 3, 'period_min' => 10, 'period_max' => 20, 'price' => 520]);
        DB::table('offer')->insert(['id' => 6, 'product_id' => 1, 'supplier_id' => 4, 'period_min' => 1, 'period_max' => 3, 'price' => 1222]);
        DB::table('offer')->insert(['id' => 7, 'product_id' => 2, 'supplier_id' => 1, 'period_min' => 1, 'period_max' => 2, 'price' => 1222]);
        DB::table('offer')->insert(['id' => 8, 'product_id' => 3, 'supplier_id' => 2, 'period_min' => 2, 'period_max' => 3, 'price' => 1222]);
        DB::table('offer')->insert(['id' => 9, 'product_id' => 4, 'supplier_id' => 3, 'period_min' => 3, 'period_max' => 4, 'price' => 1222]);
        DB::table('offer')->insert(['id' => 10, 'product_id' => 5, 'supplier_id' => 4, 'period_min' => 4, 'period_max' => 5, 'price' => 1222]);
    }
}
