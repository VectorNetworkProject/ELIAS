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

class VectorFrameworkCore
{
    /** @var PluginBase $plugin */
    private $plugin;

    public function __construct(PluginBase $plugin, array $config)
    {
        $this->plugin = $plugin;
        if ($config) {
            Constants::setOption($config);
        }
    }

    /**
     * @return PluginBase
     */
    public function getPlugin(): PluginBase
    {
        return $this->plugin;
    }
}