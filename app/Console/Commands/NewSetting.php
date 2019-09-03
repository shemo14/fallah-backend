<?php

namespace App\Console\Commands;

use App\Models\AppSetting;
use Illuminate\Console\Command;

class NewSetting extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:setting';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'New Setting Key And Value';

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
        $key = $this->ask('Key Name');
        $value = $this->ask('Key Value');

        if ($this->confirm('do you wish to continue? [y|N]')) {
            $new = new AppSetting();
            $new->key = $key;
            $new->value = $value;
            $new->save();
        }
    }
}
