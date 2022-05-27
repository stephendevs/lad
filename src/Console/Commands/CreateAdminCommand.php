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
    protected $signature = 'create:admin {--super} {--default} {--generated}';

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
        if ($default) {
            $admin = Admin::create([
                'first_name' => 'Stephen Okello',
                'last_name' => 'Omoding',
            ]);
            $admin->user()->create([
                'name' => str_replace(' ', '.', $admin->last_name.' '.$admin->last_name),
                'email' => 'stephen.okello@lad.com',
                'password' => bcrypt('secret'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10)
            ]);
            $this->info('To login use Email: stephen.okello@lad.com & Password: secret');
            return;
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
