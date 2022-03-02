<?php

namespace Stephendevs\Lad\Console\Commands;

use Illuminate\Console\Command;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;




class SetEnv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'set:env {var} {val=null} {--config=null : Where it is in the configuration}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set environment variable';

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
        //check if the env file really exists before going further
        if(file_exists($path = $this->envPath()) === false){
            $this->info('The env file seems not to exist');
            return;
        }

        $this->set($this->argument('var'), $this->argument('val'));
    }


    //Path to env file
    private function envPath()
    {
        if (method_exists($this->laravel, 'environmentFilePath')) {
            return $this->laravel->environmentFilePath();
        }
        return $this->laravel->basePath('.env');
    }

    private function set($var, $val)
    {
        if (Str::contains(file_get_contents($this->envPath()), $var) === false) {
            file_put_contents($this->envPath(), PHP_EOL."$var=$val".PHP_EOL, FILE_APPEND);
            $this->info('Env variable create and set successfully');
        }else{
            if($this->option('config') != null){
                file_put_contents($path = $this->envPath(), str_replace(
                    $var.'='.$this->laravel['config'][$this->option('config')],
                    $var.'='.$val, file_get_contents($path)
                ));
                $this->info($var.' has been set to '.$val);
            }
            
        }
    }


    
}
