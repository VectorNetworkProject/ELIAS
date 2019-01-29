<?php
/**
 * Copyright (c) 2019 VectorNetworkProject. All rights reserved. MIT license.
 *
 * GitHub: https://github.com/VectorNetworkProject/Framework
 * Website: https://www.vector-network.tk
 */

namespace VectorNetworkProject\Framework\util;

class Constants
{
    /** @var array $option */
    public static $option = [
        'framework' => [
            'enabled' => true,
            'discord' => [
                'webhook' => [
                    'error-report' => [
                        'enabled' => false,
                        'url'     => null,
                    ],
                    'crash-report' => [
                        'enabled' => false,
                        'url'     => null,
                    ],
                ],
            ],
        ],
        'provider' => [
            'user' => [],
        ],
    ];

    /**
     * @param string $key
     *
     * @return mixed
     *
     * @example Constants::getOption('provider.user'); // array()
     */
    public static function getOption(string $key)
    {
        if (isset(self::$option[$key])) {
            return self::$option[$key];
        }

        $vars = explode('.', $key);
        $keys = array_shift($vars);
        if (isset(self::$option[$keys])) {
            $keys = self::$option[$keys];
        } else {
            return null;
        }

        while (count($vars) > 0) {
            $baseKey = array_shift($vars);
            if (is_array($keys) && isset($keys[$baseKey])) {
                $keys = $keys[$baseKey];
            } else {
                return null;
            }
        }

        return self::$option[$key] = $keys;
    }

    /**
     * @param array $option
     */
    public static function setOption(array $option): void
    {
        self::$option = $option;
    }
}
