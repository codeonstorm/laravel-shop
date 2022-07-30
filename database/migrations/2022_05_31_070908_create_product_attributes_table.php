<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
        //    $table->unsignedBigInteger('product_id');
            $table->foreignId('product_id')->refrences('id')->on('products');

      //      $table->unsignedBigInteger('size_id');
            $table->foreignId('size_id')->refrences('id')->on('sizes');


    //        $table->unsignedBigInteger('color_id');
            $table->foreignId('color_id')->refrences('id')->on('colors');
            $table->string('sku');
            $table->float('mrp',8,2);
            $table->float('price',8,2);
            $table->unsignedInteger('qty');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_attributes');
    }
}
