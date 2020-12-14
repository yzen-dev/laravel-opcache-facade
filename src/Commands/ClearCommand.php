<?php

namespace LaravelOpcacheFacade\Commands;

use Illuminate\Console\Command;
use LaravelOpcacheFacade\OpcacheFacade;

/**
 * Class ClearCommand
 * @package LaravelOpcacheFacade\Commands
 */
class ClearCommand extends Command
{
    /** @var string The console command name. */
    protected $signature = 'opcache:clear';

    /** @var string The console command description. */
    protected $description = 'Resets the contents of the opcode cache';

    /** @return mixed Execute the console command. */
    public function handle()
    {
        if (OpcacheFacade::clear()) {
            $this->info('OPcache successfully reset ');
        } else {
            $this->error('An error occurred while reset opcache');
            exit(2);
        }
    }
}
