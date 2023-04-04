<?php namespace Vipapanna\Restaurants\Models;

use Model;

/**
 * Restaurant Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Restaurant extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table name
     */
    public $table = 'vipapanna_restaurants_restaurants';

    /**
     * @var array rules for validation
     */
    public $rules = [];

    public $hasMany = [
        'foods' => [
            Food::class
        ]
    ];
}
