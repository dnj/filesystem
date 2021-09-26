<?php

namespace dnj\Filesystem;

use dnj\Filesystem\Contracts\IFile;

abstract class File extends Node implements IFile
{
    public function copyFrom(IFile $source): void
    {
        $source->copyTo($this);
    }

    public function getExtension(): string
    {
        $dot = strrpos($this->basename, '.');
        if (false === $dot) {
            return '';
        }

        return substr($this->basename, $dot + 1);
    }

    public function isEmpty(): bool
    {
        return 0 === $this->size();
    }

    public function md5(bool $raw = false): string
    {
        return md5($this->read(), $raw);
    }

    public function sha1(bool $raw = false): string
    {
        return sha1($this->getPath(), $raw);
    }
}
