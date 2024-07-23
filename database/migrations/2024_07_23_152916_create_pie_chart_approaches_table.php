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
        Schema::create('pie_chart_approaches', function (Blueprint $table) {
            $table->id();
            $table->string('percentage')->nullable();
            $table->string('service')->nullable();
            $table->string('approach')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pie_chart_approaches');
    }
};
