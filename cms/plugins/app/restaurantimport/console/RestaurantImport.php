<?php namespace App\RestaurantImport\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

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
        $this->output->writeln('kokot world!');
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
