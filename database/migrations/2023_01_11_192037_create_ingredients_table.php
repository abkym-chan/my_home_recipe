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
        Schema::create('ingredients', function (Blueprint $table) {
            $table->comment('材料');
            $table->id();
            $table->foreignId('recipe_id')->constrained('recipes')->comment('レシピID');
            $table->string('name', 50)->nullable()->comment('材料名');
            $table->string('quantity', 20)->nullable()->comment('分量');
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
        Schema::dropIfExists('ingredients');
    }
};
