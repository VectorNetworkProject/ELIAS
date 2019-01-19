<?php
/**
 * Copyright (c) 2019 VectorNetworkProject. All rights reserved. MIT license.
 *
 * GitHub: https://github.com/VectorNetworkProject/Framework
 * Website: https://www.vector-network.tk
 */

namespace VectorNetworkProject\Framework\provider\base;

interface Provider
{
    public function init(): void;

    /**
     * @return bool
     */
    public function hasTable(): bool;

    /**
     * @return void
     */
    public function createTable(): void;

    /**
     * @return void
     */
    public function deleteTable(): void;

    /**
     * @param string $table
     *
     * @return mixed
     */
    public function getAll(string $table);

    /**
     * @param string $table
     *
     * @return mixed
     */
    public function getKeys(string $table);

    /**
     * @param string $table
     * @param string $key
     *
     * @return mixed
     */
    public function get(string $table, string $key);

    /**
     * @param string $table
     * @param string $key
     *
     * @return bool
     */
    public function has(string $table, string $key): bool;

    /**
     * @param string $table
     * @param $data
     *
     * @return mixed
     */
    public function create(string $table, $data);

    /**
     * @param string $table
     * @param $data
     *
     * @return mixed
     */
    public function update(string $table, $data);

    /**
     * @param string $table
     * @param $data
     *
     * @return mixed
     */
    public function delete(string $table, $data);
}
