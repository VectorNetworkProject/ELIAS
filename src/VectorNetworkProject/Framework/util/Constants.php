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
    public static $option = [
        'framework' => true,
    ];

    /**
     * @return array
     */
    public static function getOption(): array
    {
        return self::$option;
    }

    /**
     * @param array $option
     */
    public static function setOption(array $option): void
    {
        self::$option = $option;
    }
}