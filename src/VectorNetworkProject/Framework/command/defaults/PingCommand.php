<?php
/**
 * Copyright (c) 2019 VectorNetworkProject. All rights reserved. MIT license.
 *
 * GitHub: https://github.com/VectorNetworkProject/Framework
 * Website: https://www.vector-network.tk
 */

namespace VectorNetworkProject\Framework\command\defaults;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use VectorNetworkProject\Framework\command\PlayerCommand;

class PingCommand extends PlayerCommand
{
    public function __construct(PluginBase $plugin, string $name, bool $isAdmin = false)
    {
        $this->setDescription('');
        $this->setUsage('[player: string]');
        parent::__construct($plugin, $name, $isAdmin);
    }

    /**
     * @param Player $sender
     * @param array  $args
     * @param string $commandLabel
     *
     * @return bool
     */
    public function onCommand(Player $sender, array $args, string $commandLabel): bool
    {
        $target = null;

        isset($args[0])
            ? $target = Server::getInstance()->getPlayer($args[0])
            : $target = $sender;

        $target === null
            ? $sender->sendMessage('Not found player')
            : $sender->sendMessage("{$target->getName()}'s Ping: {$target->getName()}");

        return true;
    }
}
