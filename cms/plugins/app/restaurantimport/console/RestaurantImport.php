<?php namespace App\RestaurantImport\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Support\Facades\Http;
use Vipapanna\Restaurants\Models\Restaurant;


/**
 * RestaurantImport Command
 *
 * @link https://docs.octobercms.com/3.x/extend/console-commands.html
 */
class RestaurantImport extends Command
{
    /**
     * @var string name is the console command name
     */
    protected $name = 'restaurantimport:import';

    /**
     * @var string description is the console command description
     */
    protected $description = 'No description provided yet...';

    /**
     * handle executes the console command
     */
    public function handle()
    {
        $response = Http::get('https://consumer-api.wolt.com/v1/pages/restaurants?lat=48.14427439713017&lon=17.1127243958451');
        $body = json_decode($response->body(), true);

        $items = $body['sections'][1]['items'];
        for ($i = 0; $i < 64; $i++) {
            $item = $items[$i];

            $slug = array_get($item, 'venue.slug');
            if (!$slug) {
                continue;
            }

            $restaurant = Restaurant::create([
                'restaurant_name' => $item['venue']['name'],
                'review' => array_get($item, 'venue.rating.rating') ?? 3,
                'address' => $item['venue']['address'],
                'restaurant_image_link' => $item['image']['url']
            ]);

            $response = Http::get("https://restaurant-api.wolt.com/v4/venues/slug/{$slug}/menu/data?unit_prices=true&show_weighted_items=true&show_subcategories=true");
            $restaurantBody = json_decode($response->body(), true);

            try {
                for ($j = 0; $j < 25; $j++) {
                    $foodItem = $restaurantBody['items'][$j];

                    $price = $foodItem['baseprice'];
                    $restaurant->foods()->create([
                        'food_name' => $foodItem['name'],
                        'description' => $foodItem['description'],
                        'price_wolt' => $price / 100,
                        'food_image_link' => $foodItem['image'],
                    ]);
                }
            } catch (\Exception $e) {
                continue;
            }

        }

    }

    /**
     * getArguments get the console command arguments
     */
    protected function getArguments()
    {
        return [];
    }

    /**
     * getOptions get the console command options
     */
    protected function getOptions()
    {
        return [];
    }
}