<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->integer('prod_sku');
            $table->longText('prod_Live_URL');
            $table->longText('prod_name');
            $table->longText('prod_long_desc');
            $table->string('prod_type');
            $table->longText('prod_subcategory');
            $table->longText('prodmeta_section');
            $table->integer('prodmeta_ship_days');
            $table->longText('prodmeta_metal_weight')->nullable();
            $table->longText('prodmeta_side_diamonds_count')->nullable();
            $table->longText('prodmeta_side_diamonds_ctw')->nullable();
            $table->longText('prodmeta_side_diamonds_color_clarity')->nullable();
            $table->integer('prodmeta_side_diamonds1_count')->nullable();
            $table->integer('attr_14k_regular')->nullable();
            $table->longText('attr_14k_metal_available')->nullable();
            $table->integer('attr_18k_regular')->nullable();
            $table->longText('attr_18k_metal_available')->nullable();
            $table->integer('attr_platinum_regular')->nullable();
            $table->longText('attr_whitegold_platinum_round_default_img')->nullable();
            $table->longText('attr_whitegold_platinum_round_img')->nullable();
            $table->longText('attr_rosegold_round_default_img')->nullable();
            $table->longText('attr_rosegold_round_img')->nullable();
            $table->longText('attr_yellowgold_round_default_img')->nullable();
            $table->longText('attr_yellowgold_round_img')->nullable();
            $table->longText('attr_whitegold_yellow_round_default_img')->nullable();
            $table->longText('attr_whitegold_yellow_round_img')->nullable();
            $table->longText('attr_whitegold_rose_round_default_img')->nullable();
            $table->longText('attr_whitegold_rose_round_img')->nullable();
            $table->longText('attr_tricolor_round_default_img')->nullable();
            $table->longText('attr_tricolor_round_img')->nullable();
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
};
