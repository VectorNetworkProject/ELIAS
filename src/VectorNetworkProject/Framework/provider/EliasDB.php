<?php
/**
 * Copyright (c) 2019 VectorNetworkProject. All rights reserved. MIT license.
 *
 * GitHub: https://github.com/VectorNetworkProject/Framework
 * Website: https://www.vector-network.tk
 */

namespace VectorNetworkProject\Framework\provider;

use VectorNetworkProject\Framework\provider\base\Provider;
use VectorNetworkProject\Framework\provider\base\ProviderBase;

class EliasDB extends ProviderBase implements Provider
{
    /**
     * EliasDB constructor.
     *
     * @param string $directory
     * @param string $file
     */
    public function __construct(string $directory, string $file)
    {
        parent::__construct($directory, $file, 'json');
    }

    public function init(): void
    {
        if (!file_exists($this->getDirectory())) {
            @mkdir($this->getDirectory());
        }
    }

    /**
     * @return bool
     */
    public function hasTable(): bool
    {
        return file_exists($this->getFilePath());
    }

    /**
     * @return void
     */
    public function createTable(): void
    {
        if ($this->hasTable()) {
            touch($this->getFilePath());
        }
    }

    /**
     * @return void
     */
    public function deleteTable(): void
    {
        if ($this->hasTable()) {
            unlink($this->getFilePath());
        }
    }

    /**
     * @param string $table
     *
     * @return mixed
     */
    public function getAll(string $table)
    {
        // TODO: Implement getAll() method.
    }

    /**
     * @param string $table
     *
     * @return mixed
     */
    public function getKeys(string $table)
    {
        // TODO: Implement getKeys() method.
    }

    /**
     * @param string $table
     * @param string $key
     *
     * @return mixed
     */
    public function get(string $table, string $key)
    {
        // TODO: Implement get() method.
    }

    /**
     * @param string $table
     * @param string $key
     *
     * @return bool
     */
    public function has(string $table, string $key): bool
    {
        // TODO: Implement has() method.
    }

    /**
     * @param string $table
     * @param $data
     *
     * @return mixed
     */
    public function create(string $table, $data)
    {
        // TODO: Implement create() method.
    }

    /**
     * @param string $table
     * @param $data
     *
     * @return mixed
     */
    public function update(string $table, $data)
    {
        // TODO: Implement update() method.
    }

    /**
     * @param string $table
     * @param $data
     *
     * @return mixed
     */
    public function delete(string $table, $data)
    {
        // TODO: Implement delete() method.
    }

    /**
     * @return array|null
     */
    private function decode(): ?array
    {
        return json_decode($this->getFilePath());
    }

    /**
     * @return string|null
     */
    private function encode(): ?string
    {
        return json_encode($this->getFilePath(), JSON_PRETTY_PRINT);
    }
}
