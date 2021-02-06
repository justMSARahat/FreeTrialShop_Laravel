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
            $table->text('title');
            $table->text('slug');
            $table->text('short_desc');
            $table->text('main_desc');
            $table->string('tags');
            $table->integer('brand_id');
            $table->integer('cat_id');
            $table->integer('is_featured')->defualt(0)->comment('0=>Normal,1=>featured');
            $table->integer('product_type')->defualt(0)->comment('0=>New,1=>Pre-Owned');
            $table->integer('status')->defualt(0)->comment('0=>Pending,1=>Active,2=>Inactive,3=>disabled');
            $table->integer('quantity')->defualt(1);
            $table->string('sku')->nullable();
            $table->unsignedinteger('reguler_price');
            $table->unsignedinteger('offer_price')->nullable();
            $table->text('primary_image');
            $table->text('second_image')->nullable();
            $table->text('third_image')->nullable();
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
