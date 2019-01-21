<?php
/**
 * Copyright (c) 2019 VectorNetworkProject. All rights reserved. MIT license.
 *
 * GitHub: https://github.com/VectorNetworkProject/Framework
 * Website: https://www.vector-network.tk
 */

namespace VectorNetworkProject\Framework\provider\base;

class ProviderBase
{
    /** @var string $directory */
    private $directory;

    /** @var string $file */
    private $file;

    /** @var array $storeData */
    protected $cacheData;

    /**
     * ProviderBase constructor.
     *
     * @param string $directory
     * @param string $file
     * @param string $extension
     */
    public function __construct(string $directory, string $file, string $extension)
    {
        $this->directory = $directory.$extension.'/';
        $this->file = $file.'.'.$extension;
    }

    /**
     * @return string
     */
    public function getDirectory(): string
    {
        return $this->directory;
    }

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->file;
    }

    /**
     * @return string
     */
    public function getFilePath(): string
    {
        return $this->directory.$this->file;
    }
}
