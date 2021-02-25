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
            $table->string('title');
            $table->longText('description');
            $table->decimal('price', 10, 2);
            $table->decimal('tax', 10, 2)->default(0);
            $table->boolean('active')->default(1);
            $table->integer('quantity');
            $table->longText('image');
            $table->unsignedBigInteger('product_category_id');
            $table->foreign('product_category_id')->references('id')->on('product_categories')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('product_sub_category_id');
            $table->foreign('product_sub_category_id')->references('id')->on('product_sub_categories')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('suppliers')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
