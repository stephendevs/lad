<?php

namespace Stephendevs\Lad\Console\Commands;

use Illuminate\Console\Command;

use Stephendevs\Lad\Models\Admin\Admin;
use Stephendevs\Lad\Models\Permission\Permission;
use Illuminate\Support\Str;


class SeedPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:permissions {--fresh}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert lad config permissions into the db';

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
       if (count(config('lad.permissions', []))) {
           $permissions = config('lad.permissions');
           foreach ($permissions as $key => $value) {
               $permission = new Permission();
               $permission->permission = $key;
               $permission->description = $value;
               $permission->save();
               $this->info($key.' permission created successfully');
           }
       } else {
           $this->info('No permissions configured');
       }
       
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
                'password' => $password,
                'email_verified_at' => now(),
                'remember_token' => Str::random(10)
            ]);
            $this->line($admin);
            $this->info('Admin Created Successfully');
            //($superadmin == true) ? $this->superAdminPermissions($admin->id) : '';
        }
    }

    private function superAdminPermissions($admin_id)
    {
        $manaegeUsersPermissions = lad_manage_users_permissions();
        $systemPermissions = config('lad.permissions', []);

        $permissions = array_merge($systemPermissions, $manaegeUsersPermissions);

        foreach($permissions as $key => $value){
            Permission::create([
                'permission' => $key,
                'admin_id' => $admin_id
            ]);
        }
        $this->info('Super user permissions assigned');
    }
}
