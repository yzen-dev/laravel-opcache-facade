<?php

namespace LaravelOpcacheFacade;

/**
 * Class OpcacheFacade
 * @package LaravelOpcacheFacade
 */
class OpcacheFacade
{
    /**
     * Resets the contents of the opcode cache
     * @return bool
     */
    public static function clear()
    {
        if (function_exists('opcache_reset')) {
            return opcache_reset();
        }
    }

    /**
     * Get configuration information about the cache
     * @return array
     */
    public static function getConfig()
    {
        if (function_exists('opcache_get_configuration')) {
            return opcache_get_configuration();
        }
    }

    /**
     * Get status information about the cache
     * @return array
     */
    public static function getStatus()
    {
        if (function_exists('opcache_get_status')) {
            return opcache_get_status(false);
        }
    }
}
