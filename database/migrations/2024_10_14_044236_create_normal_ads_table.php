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
        Schema::create('normal_ads', function (Blueprint $table) {
            $table->id();
            $table->string('home_img')->nullable();
            $table->string('home_link')->nullable();
            $table->string('first_home_img')->nullable();
            $table->boolean('on_off')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('normal_ads');
    }
};
