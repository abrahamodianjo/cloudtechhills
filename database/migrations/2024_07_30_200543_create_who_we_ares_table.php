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
        Schema::create('who_we_ares', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('caption')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('icon_1')->nullable();
            $table->string('icon_1_title')->nullable();
            $table->text('icon_1_description')->nullable();
            $table->string('icon_2')->nullable();
            $table->string('icon_2_title')->nullable();
            $table->text('icon_2_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('who_we_ares');
    }
};
