<?php namespace Vipapanna\Restaurants;

use Backend;
use System\Classes\PluginBase;

/**
 * Plugin Information File
 *
 * @link https://docs.octobercms.com/3.x/extend/system/plugins.html
 */
class Plugin extends PluginBase
{
    /**
     * pluginDetails about this plugin.
     */
    public function pluginDetails()
    {
        return [
            'name' => 'restaurants',
            'description' => 'No description provided yet...',
            'author' => 'vipapanna',
            'icon' => 'icon-leaf'
        ];
    }

    /**
     * register method, called when the plugin is first registered.
     */
    public function register()
    {
        //
    }

    /**
     * boot method, called right before the request route.
     */
    public function boot()
    {
        //
    }

    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Vipapanna\Restaurants\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * registerPermissions used by the backend.
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'vipapanna.restaurants.some_permission' => [
                'tab' => 'restaurants',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * registerNavigation used by the backend.
     */
    public function registerNavigation()
    {


        return [
            'restaurants' => [
                'label' => 'restaurants',
                'url' => Backend::url('vipapanna/restaurants/restaurants'),
                'icon' => 'icon-cutlery',
                'permissions' => ['vipapanna.restaurants.*'],
                'order' => 500,
            ],
        ];
    }
}
