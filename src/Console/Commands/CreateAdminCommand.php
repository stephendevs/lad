<?php

namespace Stephendevs\Lad\Console\Commands;

use Illuminate\Console\Command;

use Stephendevs\Lad\Models\Admin\Admin;
use Stephendevs\Lad\Models\Permission\Permission;
use Illuminate\Support\Str;


class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin {--super} {--default}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new dashboard admin';

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
        $this->createAdmin($this->option('super'), $this->option('default'));
    }


    private function createAdmin($superadmin = false, $default = false)
    {
        $admin = new Admin();

        if ($default) {
            $admin->first_name = 'stephen';
            $admin->last_name = 'omoding';

            $email = 'admin@lad.com';
            $password = bcrypt('secret');

        } else {
            # code...
            $first_name = $this->ask('Enter First Name ..');
            $last_name = $this->ask('Enter Last Name .. ');
            $email = $this->ask('Enter email Address .. No spacing');
            $password = $this->ask('Enter Password .. No spacing');

            $admin->first_name = $first_name;
            $admin->last_name = $last_name;
        }

        //Display admin info for confirmation
        $this->line('Please confirm the info below before proceding...');
        $this->info($admin);

        if($this->confirm('Enter y to procede')){
            $save = $admin->save();
            $admin->user()->create([
                'name' => str_replace(' ', '.', $admin->last_name.' '.$admin->last_name),
                'email' => $email,
                'password' => bcrypt($password),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10)
            ]);
            $this->line($admin);
            $this->info('Admin Created Successfully');
            ($superadmin == true) ? $this->superAdminPermissions($admin) : '';
        }
    }

    private function superAdminPermissions($admin)
    {

        $permissions = Permission::all();

        foreach($permissions as $permission){
           $admin->permissions()->create([
               'permission_id' => $permission->id
           ]);
        }
        $this->info('Super user permissions assigned');
    }
}
