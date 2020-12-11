<?php

namespace LaravelOpcacheFacade\Commands;

use Illuminate\Console\Command;
use LaravelOpcacheFacade\OpcacheFacade;

class ConfigCommand extends Command
{
    /** @var string The console command name.*/
    protected $signature = 'opcache:config';

    /** @var string The console command description.*/
    protected $description = 'Show configuration information about the cache';

    /** @return mixed Execute the console command. */
    public function handle()
    {
        $config = OpcacheFacade::getConfig();
        if ($config) {
            $this->info('Version info:');
            $this->table(
                ['key', 'value'],
                $this->prepareTable($config['version']),
                'box-double'
            );

            $this->info('Configuration info:');
            $this->table(
                ['key', 'value'],
                $this->prepareTable($config['directives']),
                'box-double'
            );
        } else {
            $this->error('An error occurred while get config opcache');
            exit(2);
        }
    }

    /**
     * @param $data
     *
     * @return array|array[]
     */
    protected function prepareTable($data)
    {
        $prepareRowTable = static function ($key, $value) {
            return [
                'key' => $key,
                'value' => $value,
            ];
        };
        return array_map($prepareRowTable, array_keys($data), $data);
    }
}
