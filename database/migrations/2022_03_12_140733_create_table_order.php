<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('state', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('order_head', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->dateTime('create_date');
            $table->integer('state_id');
            $table->string('order_number');
            $table->timestamps();
        });
        Schema::create('order_spc', function (Blueprint $table) {
            $table->id();
            $table->integer('order_head_id');
            $table->integer('product_id');
            $table->integer('supplier_id');
            $table->integer('period_min');
            $table->integer('period_max');
            $table->integer('quantity');
            $table->decimal('price');
            $table->timestamps();
        });

        Schema::create('order_state', function (Blueprint $table) {
            $table->id();
            $table->integer('order_spc_id');
            $table->integer('state_id');
            $table->integer('quantity');
            $table->string('comment');
            $table->timestamps();
        });

        DB::table('state')->insert(['id' => 10, 'name' => 'Новый']);
        DB::table('state')->insert(['id' => 20, 'name' => 'В работе']);
        DB::table('state')->insert(['id' => 30, 'name' => 'На складе']);
        DB::table('state')->insert(['id' => 40, 'name' => 'Отгружено']);
        DB::table('state')->insert(['id' => 50, 'name' => 'В архиве']);

        DB::table('state')->insert(['id' => 1010, 'name' => 'Отклонено поставщиком']);
        DB::table('state')->insert(['id' => 1020, 'name' => 'Отменено']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('state');
        Schema::dropIfExists('order_head');
        Schema::dropIfExists('order_spc');
        Schema::dropIfExists('order_state');
    }
};
