<?php

namespace LaravelOpcacheFacade\Commands;

use Illuminate\Console\Command;
use LaravelOpcacheFacade\OpcacheFacade;
use LaravelOpcacheFacade\utils\CommandUtil;

/**
 * Class ConfigCommand
 * @package LaravelOpcacheFacade\Commands
 */
class ConfigCommand extends Command
{
    /** @var string The console command name. */
    protected $signature = 'opcache:config';

    /** @var string The console command description. */
    protected $description = 'Show configuration information about the cache';

    /** @return mixed Execute the console command. */
    public function handle()
    {
        $config = OpcacheFacade::getConfig();
        if ($config) {
            $header = ['key', 'value'];

            $this->info('Version info:');
            $this->table($header, CommandUtil::prepareTable($config['version']), 'box-double');

            $this->info('Configuration info:');
            $this->table($header, CommandUtil::prepareTable($config['directives']), 'box-double');
        } else {
            $this->error('An error occurred while get config opcache');
            exit(2);
        }
    }
}
