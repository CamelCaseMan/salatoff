<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MakeRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:role';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Добавляем роли пользователей';

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
     * @return int
     */
    public function handle()
    {
        Artisan::call('permission:create-role manager');
        Artisan::call('permission:create-role client');
        $this->info('Роли добавлены!');
    }
}
