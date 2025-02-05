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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->integer('qty');
            $table->double('price');
            $table->timestamps();
        });


        Schema::table('order_details', function(Blueprint $table) {


         $table->foreign('order_id')->references('id')->on('orders')
                ->onUpdate('cascade')
                ->onDelete('cascade');
               
           
     $table->foreign('product_id')->references('id')->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_details', function(Blueprint $table) {
            $table->dropForeign('order_details_order_id_foreign');
        });
         Schema::table('order_details', function(Blueprint $table) {
            $table->dropIndex('order_details_order_id_foreign');
        });


        Schema::table('order_details', function(Blueprint $table) {
            $table->dropForeign('order_details_product_id_foreign');
        });
   
        Schema::table('order_details', function(Blueprint $table) {
            $table->dropIndex('order_details_product_id_foreign');
        });
       
        Schema::dropIfExists('order_details');
    }

    };


