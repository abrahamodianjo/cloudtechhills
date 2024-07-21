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
        Schema::create('countups', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->text('caption')->nullable();
            $table->text('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->text('team_members')->nullable();
            $table->text('team_members_note')->nullable();
            $table->string('happy_clients')->nullable();
            $table->text('happy_clients_note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countups');
    }
};
