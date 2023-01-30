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
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->comment('レシピ情報');
            $table->id();
            $table->string('name', 50)->comment('料理名');
            $table->text('directions')->nullable()->comment('作り方');
            $table->tinyInteger('per_servings')->nullable()->comment('人分');
            $table->string('image_path', 20)->nullable()->comment('画像');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
};
