<?php

namespace Stephendevs\Lad\Console\Commands;

use Illuminate\Console\Command;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;


use Stephendevs\Lad\Models\Option\Option;


class OptionsClearCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'options:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all options from cache';

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
                Cache::forget($item->option_key);
            } 
            $this->info('All options removed from cache');
        }else{
            $this->info('No options to clear');
        }
    }

    
}
