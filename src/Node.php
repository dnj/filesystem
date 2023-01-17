<?php

namespace dnj\Filesystem;

use dnj\Filesystem\Contracts\IDirectory;
use dnj\Filesystem\Contracts\INode;
use dnj\Filesystem\Exceptions\IOException;

abstract class Node implements INode
{
    public string $directory;
    public string $basename;

    public function __construct(string $path)
    {
        $this->directory = dirname($path);
        $this->basename = basename($path);
    }

    public function getBasename(): string
    {
        return $this->basename;
    }

    public function getDirname(): string
    {
        return $this->directory;
    }

    public function getPath(): string
    {
        return ($this->directory == DIRECTORY_SEPARATOR) ?
                $this->directory.$this->basename :
                $this->directory.DIRECTORY_SEPARATOR.$this->basename;
    }

    /**
     * @throws IOException if the file doesn't placed on given directory
     */
    public function getRelativePath(IDirectory $base): string
    {
        $basePath = $base->getPath().'/';
        $path = $this->getPath();
        if (substr($path, 0, strlen($basePath)) !== $basePath) {
            throw new IOException($this, "this file doesn't placed on given directory");
        }

        return substr($path, strlen($basePath));
    }
}
