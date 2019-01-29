<?php
/**
 * Copyright (c) 2019 VectorNetworkProject. All rights reserved. MIT license.
 *
 * GitHub: https://github.com/VectorNetworkProject/Framework
 * Website: https://www.vector-network.tk
 */

namespace VectorNetworkProject\Framework;

use pocketmine\plugin\PluginBase;
use VectorNetworkProject\Framework\command\defaults\PingCommand;
use VectorNetworkProject\Framework\util\Constants;

class EliasCore
{
    /** @var PluginBase $plugin */
    private static $plugin;

    /**
     * @param PluginBase $plugin
     * @param array|null $config
     */
    public static function init(PluginBase $plugin, ?array $config = null)
    {
        self::$plugin = $plugin;
        if ($config) {
            Constants::setOption($config);
        }

        if (Constants::getOption('commands')) {
            $plugin->getServer()->getCommandMap()->registerAll('elias', [
                new PingCommand($plugin, 'ping'),
            ]);
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
