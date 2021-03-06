<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductProductType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_product_type', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('product_type_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('product_product_type', function (Blueprint $table) {
            $table->dropIfExists('product_product_type');
            
        });
    }
}
