<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {
    /**
     * Запустить миграции.
     *
     * @return void
     */
    
    public function up() {
        Schema::create('products', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('user_id');
            $table->integer('code');
            $table->string('name');
            $table->string('image');
            $table->integer('price');
            $table->integer('discount')->default(0);
            $table->text('detail');
            $table->timestamps();
        });
    }

    /**
     * Перевернуть миграции.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('products');
    }
}
