<?php
/**
 * Copyright (c) 2019 VectorNetworkProject. All rights reserved. MIT license.
 *
 * GitHub: https://github.com/VectorNetworkProject/Framework
 * Website: https://www.vector-network.tk
 */

namespace VectorNetworkProject\Framework;

use pocketmine\plugin\PluginBase;
use VectorNetworkProject\Framework\util\Constants;

class FrameworkCore
{
    /** @var PluginBase $plugin */
    private static $plugin;

    public function init(PluginBase $plugin, array $config)
    {
        self::$plugin = $plugin;
        if ($config) {
            Constants::setOption($config);
        }
    }

    /**
     * @return PluginBase
     */
    public static function getPlugin(): PluginBase
    {
        return self::$plugin;
    }
}
