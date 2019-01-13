<?php
/**
 * Copyright (c) 2019 VectorNetworkProject. All rights reserved. MIT license.
 *
 * GitHub: https://github.com/VectorNetworkProject/Framework
 * Website: https://www.vector-network.tk
 */

namespace VectorNetworkProject\Framework\command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\utils\InvalidCommandSyntaxException;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;

abstract class PlayerCommand extends Command
{
    /** @var PluginBase $plugin */
    private $plugin;

    /**
     * FrameworkCommand constructor.
     *
     * @param PluginBase $plugin
     * @param string     $name
     */
    public function __construct(PluginBase $plugin, string $name)
    {
        parent::__construct($name);
        $this->plugin = $plugin;
    }

    /**
     * @param CommandSender $sender
     * @param string        $commandLabel
     * @param string[]      $args
     *
     * @return mixed
     */
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if (!$this->plugin->isEnabled()) {
            return false;
        }

        if (!$this->testPermission($sender)) {
            return false;
        }

        if (!$sender instanceof Player) {
            $this->plugin->getLogger()->error('このコマンドはプレイヤーのみ実行出来ます。');

            return false;
        }

        $success = $this->onCommand($sender, $args, $commandLabel);

        if (!$success and $this->usageMessage !== '') {
            throw new InvalidCommandSyntaxException();
        }

        return $success;
    }

    /**
     * @param CommandSender $sender
     * @param array         $args
     * @param string        $commandLabel
     *
     * @return bool
     */
    abstract public function onCommand(CommandSender $sender, array $args, string $commandLabel): bool;

    /**
     * @return PluginBase
     */
    public function getPlugin(): PluginBase
    {
        return $this->plugin;
    }
}
