<?php
/**
 * Copyright (c) 2019 VectorNetworkProject. All rights reserved. MIT license.
 *
 * GitHub: https://github.com/VectorNetworkProject/Framework
 * Website: https://www.vector-network.tk
 */

namespace VectorNetworkProject\Framework;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\MainLogger;
use VectorNetworkProject\Framework\util\Constants;

class EliasCore
{
    /** @var PluginBase $plugin */
    private static $plugin;

    /** @var MainLogger $logger */
    private static $logger;

    /**
     * @param PluginBase $plugin
     * @param array|null $config
     */
    public function init(PluginBase $plugin, ?array $config)
    {
        self::$plugin = $plugin;
        self::$logger = new MainLogger(self::getPlugin()->getDataFolder().'elias.log');
        if ($config) {
            Constants::setOption($config);
        } else {
            self::$logger->alert('Option is null');
            self::$plugin->setEnabled(false);
        }
    }

    /**
     * @return PluginBase
     */
    public static function getPlugin(): PluginBase
    {
        return self::$plugin;
    }

    /**
     * @return MainLogger
     */
    public static function getLogger(): MainLogger
    {
        return self::$logger;
    }
}
