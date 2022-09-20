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
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('image');
            $table->integer('price');
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
