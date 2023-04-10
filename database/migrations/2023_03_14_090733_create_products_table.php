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
            $table->id();
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('maincategory_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->string('product_name');
            $table->integer('product_price');
            $table->integer('featured');
            $table->integer('discount')->nullable();
            $table->integer('after_discount');
            $table->string('short_desp')->nullable();
            $table->string('preview_one')->nullable();
            $table->string('preview_two')->nullable();
            $table->longText('long_desc');
            $table->longText('additional_desc')->nullable();
            $table->string('slug');
            $table->integer('added_by');
            $table->timestamps();
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
