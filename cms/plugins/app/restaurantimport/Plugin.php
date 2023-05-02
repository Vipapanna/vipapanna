<?php namespace App\RestaurantImport;

use App\RestaurantImport\Console\RestaurantImport;
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
            'name' => 'RestaurantImport',
            'description' => 'No description provided yet...',
            'author' => 'App',
            'icon' => 'icon-leaf'
        ];
    }

    /**
     * register method, called when the plugin is first registered.
     */
    public function register()
    {
        $this->registerConsoleCommand('app.restaurantimport', RestaurantImport::class);
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
            'App\RestaurantImport\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * registerPermissions used by the backend.
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'app.restaurantimport.some_permission' => [
                'tab' => 'RestaurantImport',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * registerNavigation used by the backend.
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'restaurantimport' => [
                'label' => 'RestaurantImport',
                'url' => Backend::url('app/restaurantimport/mycontroller'),
                'icon' => 'icon-leaf',
                'permissions' => ['app.restaurantimport.*'],
                'order' => 500,
            ],
        ];
    }
}
