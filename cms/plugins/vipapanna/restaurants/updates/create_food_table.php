<?php namespace Vipapanna\Restaurants\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateFoodTable Migration
 *
 * @link https://docs.octobercms.com/3.x/extend/database/structure.html
 */
return new class extends Migration
{
    /**
     * up builds the migration
     */
    public function up()
    {
        Schema::create('vipapanna_restaurants_food', function(Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('restaurant_id')->nullable();
            $table->string('food_name');
            $table->string('description')->nullable();
            $table->string('values')->nullable();
            $table->string('link_wolt')->nullable();
            $table->string('link_foodora')->nullable();
            $table->string('link_bistro')->nullable();
            $table->string('price_wolt')->nullable();
            $table->string('price_foodora')->nullable();
            $table->string('price_bistro')->nullable();
            $table->string('food_image_link')->nullable();

        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
        Schema::dropIfExists('vipapanna_restaurants_food');
    }
};
