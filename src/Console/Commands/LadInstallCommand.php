<?php

namespace Stephendevs\Lad\Console\Commands;

use Illuminate\Console\Command;

use Stephendevs\Lad\Models\Admin\Admin;
use Illuminate\Support\Str;


class LadInstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lad:install {--fresh}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Laravel admin dashboard';

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
        if($this->option('fresh')){
            $this->info('Preparing to install laravel dashboard ............');
            $this->call('vendor:publish', ['--tag' => 'lad-install','--force' => true]);
            $this->call('vendor:publish', ['--tag' => 'lad-config','--force' => true]);
            $this->call('vendor:publish', ['--tag' => 'lad-assets','--force' => true]);
            $this->call('passport:install', ['--force' => true]);
            return;
        }
        $this->info('Preparing to install laravel dashboard ............');
        $this->call('vendor:publish', [
            '--tag' => 'lad-install'
        ]);
        $this->call('vendor:publish', ['--tag' => 'lad-config']);
        $this->call('vendor:publish', ['--tag' => 'lad-assets']);
        $this->call('passport:install');

       
    }


}
