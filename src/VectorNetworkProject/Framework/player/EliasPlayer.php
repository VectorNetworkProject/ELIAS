<?php
/**
 * Copyright (c) 2019 VectorNetworkProject. All rights reserved. MIT license.
 *
 * GitHub: https://github.com/VectorNetworkProject/Framework
 * Website: https://www.vector-network.tk
 */

namespace VectorNetworkProject\Framework\player;

use pocketmine\Player;
use VectorNetworkProject\Framework\EliasCore;

class EliasPlayer
{
    /** @var Player $player */
    private $player;

    public function __construct(Player $player)
    {
        $this->player = $player;
    }

    public function getGuild()
    {
        // TODO:
    }

    public function getLanguage()
    {
        // TODO:
    }

    public function getDataDirectory(): string
    {
        return EliasCore::getPlugin()->getDataFolder().'user/'.$this->getPlayer()->getXuid().'/';
    }

    /**
     * @return Player
     */
    public function getPlayer(): Player
    {
        return $this->player;
    }
}
