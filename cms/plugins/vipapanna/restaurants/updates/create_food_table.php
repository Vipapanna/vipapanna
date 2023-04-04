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
            $table->string('foodName');
            $table->string('description');
            $table->string('values')->nullable();
            $table->string('linkWolt')->nullable();
            $table->string('linkFoodPanda')->nullable();
            $table->string('linkBistro')->nullable();
            $table->string('foodImage')->nullable();

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
