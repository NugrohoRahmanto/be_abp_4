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
        Schema::create('pilih_category', function (Blueprint $table) {
            $table->unsignedBigInteger('idCategory');
            $table->unsignedBigInteger('idMenu');

            $table->foreign('idCategory')->references('id')->on('menu_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idMenu')->references('id')->on('menus')->onDelete('cascade')->onUpdate('cascade');
        
            $table->primary(['idCategory', 'idMenu']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pilih_category');
    }
};
