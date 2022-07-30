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
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('short_desc')->default(null);
            $table->text('desc')->default(null);
            $table->string('keywords')->default(null);
         //   $table->unsignedBigInteger('cat_id');
            $table->foreignId('cat_id')->refrences('id')->on('categoies');
            $table->foreignId('brand_id')->refrences('id')->on('brands')->default(null);
            $table->tinyInteger('is_featured')->default(0);
            $table->tinyInteger('is_tranding')->default(0);
            $table->tinyInteger('status')->default(0);
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
