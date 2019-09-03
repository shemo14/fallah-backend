<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class NewAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'New Admin';

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
        User::create([
            'name' => 'Admin',
            'phone' => '01024963844',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'checked' => 1,
            'role' => '1',
        ]);

        return 'Admin added successfully';
    }
}
