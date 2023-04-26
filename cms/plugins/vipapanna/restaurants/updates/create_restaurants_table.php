<?php namespace Vipapanna\Restaurants\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateRestaurantsTable Migration
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
        Schema::create('vipapanna_restaurants_restaurants', function(Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('restaurant_name');
            $table->string('restaurant_image_link')->nullable();
            $table->float('review');
            $table->string('address');

        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
        Schema::dropIfExists('vipapanna_restaurants_restaurants');
    }
};
