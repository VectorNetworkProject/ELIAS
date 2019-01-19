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
use pocketmine\plugin\PluginBase;

abstract class EliasCommand extends Command
{
    /** @var PluginBase $plugin */
    private $plugin;

    /**
     * EliasCommand constructor.
     *
     * @param PluginBase $plugin
     * @param string     $name    コマンドの名前
     * @param bool       $isAdmin コマンドの権限設定
     */
    public function __construct(PluginBase $plugin, string $name, $isAdmin = false)
    {
        $this->plugin = $plugin;
        $this->PermissionManager()->add($name, $this->description, $isAdmin);
        parent::__construct($name);
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

    /**
     * @return EliasPermission
     */
    public function PermissionManager(): EliasPermission
    {
        return new EliasPermission($this->plugin->getName());
    }
}
