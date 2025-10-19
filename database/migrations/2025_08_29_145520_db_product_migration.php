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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_product');
            $table->string('nama_product', 100);
            $table->string('subcode01', 50)->nullable();
            $table->string('subcode02', 50)->nullable();
            $table->string('subcode03', 50)->nullable();
            $table->string('subcode04', 50)->nullable();
            $table->string('uom', 20)->nullable();
            $table->string('lot', 100)->nullable();
            $table->string('po', 100)->nullable();
            $table->string('picture', 255)->nullable();
            $table->string('description', 200)->nullable();
            $table->string('creation_user')->nullable();
            $table->dateTime('creation_date')->nullable();
            $table->string('update_user')->nullable();
            $table->dateTime('update_date')->nullable();
            $table->tinyInteger('status_active')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
