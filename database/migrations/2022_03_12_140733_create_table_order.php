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
            $table->boolean('is_finish');
            $table->timestamps();
        });
        Schema::create('order_head', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->dateTime('create_date');
            $table->integer('state_id');
            $table->string('order_number');
            $table->boolean('is_finish');
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

        DB::table('state')->insert(['id' => 10, 'name' => 'Новый', 'is_finish' => false]);
        DB::table('state')->insert(['id' => 20, 'name' => 'В работе', 'is_finish' => false]);
        DB::table('state')->insert(['id' => 30, 'name' => 'На складе', 'is_finish' => false]);
        DB::table('state')->insert(['id' => 40, 'name' => 'Отгружено', 'is_finish' => true]);

        DB::table('state')->insert(['id' => 1010, 'name' => 'Отклонено поставщиком', 'is_finish' => true]);
        DB::table('state')->insert(['id' => 1020, 'name' => 'Отменено', 'is_finish' => true]);
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
