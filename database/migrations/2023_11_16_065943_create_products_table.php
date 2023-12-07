<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() // php artisan migrate 시 실행되는 함수
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 15);
            $table->string('description', 50);
            $table->integer('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() // php artisan migrate:rollback 시 사용되는 함수, 해당 테이블 명을 삭제함
    {
        Schema::dropIfExists('products');
    }
};
