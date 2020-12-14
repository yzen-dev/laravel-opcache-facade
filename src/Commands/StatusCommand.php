<?php

namespace LaravelOpcacheFacade\Commands;

use Illuminate\Console\Command;
use LaravelOpcacheFacade\OpcacheFacade;
use LaravelOpcacheFacade\utils\CommandUtil;

/**
 * Class StatusCommand
 * @package LaravelOpcacheFacade\Commands
 */
class StatusCommand extends Command
{
    /** @var string The console command name. */
    protected $signature = 'opcache:status';

    /** @var string The console command description. */
    protected $description = 'Get status information about the cache';

    /** @return mixed Execute the console command. */
    public function handle()
    {
        $info = OpcacheFacade::getStatus();
        $base = $info;
        unset($base['memory_usage'], $base['interned_strings_usage'], $base['opcache_statistics']);

        if ($info) {
            $header = ['key', 'value'];

            $this->info('Base info:');
            $this->table($header, CommandUtil::prepareTable($base), 'box-double');

            if (isset($info['memory_usage'])) {
                $this->info('Memory usage:');
                $this->table($header, CommandUtil::prepareTable($info['memory_usage']), 'box-double');
            }

            if (isset($info['interned_strings_usage'])) {
                $this->info('Interned strings usage:');
                $this->table($header, CommandUtil::prepareTable($info['interned_strings_usage']), 'box-double');
            }

            if (isset($info['opcache_statistics'])) {
                $this->info('OPcache statistics:');
                $this->table($header, CommandUtil::prepareTable($info['opcache_statistics']), 'box-double');
            }
        } else {
            $this->error('An error occurred while get status opcache');
            exit(2);
        }
    }
}
