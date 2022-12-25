<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('id');
            $table->string('product_name');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->string('product_slug');
            $table->string('product_code');
            $table->string('product_quantity');
            $table->text('short_description');
            $table->text('long_description');
            $table->integer('product_price');
           $table->string('image')->nullable();
            $table->boolean('status')->default(1)->comment('1=Active/0=InActive');
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
