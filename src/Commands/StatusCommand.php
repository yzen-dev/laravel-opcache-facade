<?php

namespace LaravelOpcacheFacade\Commands;

use Illuminate\Console\Command;
use LaravelOpcacheFacade\OpcacheFacade;

class StatusCommand extends Command
{
    /** @var string The console command name.*/
    protected $signature = 'opcache:status';

    /** @var string The console command description.*/
    protected $description = 'Get status information about the cache';

    /** @return mixed Execute the console command. */
    public function handle()
    {
        $info = OpcacheFacade::getStatus();
        if ($info) {

        } else {
            $this->error('An error occurred while get status opcache');
            exit(2);
        }
    }
}
