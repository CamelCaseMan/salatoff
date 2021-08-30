<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->unsigned();
            $table->text('nutrients')->nullable(); //Белки жиры углеводы
            $table->text('energy')->nullable(); // Энергетическая ценнность
            $table->text('composition')->nullable(); //Состав
            $table->text('implementation_period')->nullable(); //срок реализации
            $table->text('packaging')->nullable(); //упаковка
            $table->timestamps();
        });

        Schema::table('attributes', function (Blueprint $table) {
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
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
        Schema::dropIfExists('attributes');
    }
}
