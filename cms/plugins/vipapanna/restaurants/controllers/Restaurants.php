<?php namespace Vipapanna\Restaurants\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Restaurants Backend Controller
 *
 * @link https://docs.octobercms.com/3.x/extend/system/controllers.html
 */
class Restaurants extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
        \Backend\Behaviors\RelationController::class,
    ];
    public $relationConfig = 'config_relation.yaml';

    /**
     * @var string formConfig file
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string listConfig file
     */
    public $listConfig = 'config_list.yaml';

    /**
     * @var array required permissions
     */
    public $requiredPermissions = ['vipapanna.restaurants.restaurants'];

    /**
     * __construct the controller
     */
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Vipapanna.Restaurants', 'restaurants', 'restaurants');
    }
}
