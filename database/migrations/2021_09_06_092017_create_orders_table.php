<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->integer('status')->unsigned()->default(0);
            $table->string('name')->default('Нет данных');
            $table->string('phone')->default('Нет данных');
            $table->string('organization')->nullable();
            $table->string('email')->nullable();
            $table->date('delivery_date')->default('2021-12-02');
            $table->json('delivery')->nullable();
            $table->bigInteger('cupon_id')->nullable()->unsigned();
            $table->double('total')->default(0);
            $table->timestamps();
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('cupon_id')
                ->references('id')
                ->on('cupons')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
