<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->id();
			$table->string('title', 255)->unique();
			$table->integer('genre_id');
			$table->integer('price');
			$table->text('description');
			$table->integer('year');
			$table->string('country', 255);
			$table->string('director', 50);
			$table->string('duration', 50);
			$table->text('starring');
			$table->string('alias', 255);
			$table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goods');
    }
};
