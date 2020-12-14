<?php


namespace LaravelOpcacheFacade\utils;


/**
 * Class CommandUtil
 * @package LaravelOpcacheFacade\utils
 */
class CommandUtil
{
    /**
     * @param $data
     * @return array|array[]
     */
    public static function prepareTable($data): array
    {
        $prepareRowTable = static function ($key, $value) {
            return [
                'key' => $key,
                'value' => self::prepareValue($key, $value),
            ];
        };
        return array_map($prepareRowTable, array_keys($data), $data);
    }

    /**
     * @param $key
     * @param $value
     * @return false|string
     */
    public static function prepareValue($key, $value){
        if (strpos($key, 'memory') !== false || strpos($key, 'size') !== false) {
            return self::formatBytes($value);
        }
        if (strpos($key, 'time') !== false) {
            return date('Y-m-d H:i:s', $value);
        }
        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        }
        return $value;
    }

    /**
     * @param $bytes
     * @return string
     */
    public static function formatBytes($bytes): string
    {
        $unit = ['b', 'kb', 'mb', 'gb', 'tb', 'pb'];
        return @round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), 2) . ' ' . $unit[$i];
    }
}
