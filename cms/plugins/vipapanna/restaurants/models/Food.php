<?php namespace Vipapanna\Restaurants\Models;

use Model;

/**
 * Food Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Food extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table name
     */
    public $table = 'vipapanna_restaurants_food';

    /**
     * @var array rules for validation
     */
    public $rules = [];

    public $belongsTo = [
        'restaurant' => [
            Restaurant::class,
            'key' => 'restaurant_id',
        ]
    ];
}
