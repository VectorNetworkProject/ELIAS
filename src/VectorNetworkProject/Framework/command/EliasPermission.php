<?php
/**
 * Copyright (c) 2019 VectorNetworkProject. All rights reserved. MIT license.
 *
 * GitHub: https://github.com/VectorNetworkProject/Framework
 * Website: https://www.vector-network.tk
 */

namespace VectorNetworkProject\Framework\command;

use pocketmine\permission\Permission;
use pocketmine\permission\PermissionManager;

class EliasPermission
{
    /** @var string $permission */
    private $permission;

    /**
     * EliasPermission constructor.
     *
     * @param string $plugin
     */
    public function __construct(string $plugin)
    {
        $this->permission = $plugin.'.framework.permission.';
    }

    /**
     * @param string $name
     * @param string $description
     * @param bool   $isAdmin
     *
     * @return bool
     */
    public function add(string $name, $description = '', $isAdmin = false): bool
    {
        return PermissionManager::getInstance()->addPermission(new Permission($this->permission.$name, $description, $isAdmin ? Permission::DEFAULT_OP : Permission::DEFAULT_TRUE));
    }

    /**
     * @param string $name
     */
    public function remove(string $name): void
    {
        PermissionManager::getInstance()->removePermission($this->permission.$name);
    }
}
