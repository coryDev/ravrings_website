<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('merchant_id');
            $table->string('title');
            $table->text('description');
            $table->string('link');
            $table->string('image_link');
            $table->string('price');
            $table->string('google_product_category');
            $table->string('brand');
            $table->string('mpn')->nullable();
            $table->string('gtin')->nullable();
            $table->string('shipping_weight');
            $table->string('product_type')->nullable();
            $table->string('adwords_labels')->nullable();
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
        Schema::dropIfExists('products');
    }
}
