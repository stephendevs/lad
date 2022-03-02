<?php

namespace Stephendevs\Lad\Console\Commands;

use Illuminate\Console\Command;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;


use Stephendevs\Lad\Models\Option\Option;


class CacheOption extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache:option';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $options = Option::all();
        if(count($options)){
            foreach ($options as $item) {
                # code...
                Cache::forever($item->option_key, $item->option_value);
            }
            $this->info('Done caching options.');
        }else{
            $this->info('No options to cache');
        }
    }


    
}
