<?php

namespace dnj\Filesystem;

use dnj\Filesystem\Contracts\IDirectory;
use dnj\Filesystem\Contracts\IFile;

abstract class Directory extends Node implements IDirectory
{
    public function copyFrom(IDirectory $source): void
    {
        $source->copyTo($this);
    }

    public function copyTo(IDirectory $dest): void
    {
        $sourcePath = $this->getPath();
        if (!$dest->exists()) {
            $dest->make(true);
        }
        foreach ($this->items(true) as $item) {
            $relativePath = substr($item->getPath(), strlen($sourcePath) + 1);
            if ($item instanceof IFile) {
                $item->copyTo($dest->file($relativePath));
            } elseif ($item instanceof IDirectory) {
                $destDir = $dest->directory($relativePath);
                if (!$destDir->exists()) {
                    $destDir->make(true);
                }
            }
        }
    }

    public function delete(): void
    {
        foreach ($this->items(false) as $item) {
            $item->delete();
        }
    }

    public function isEmpty(): bool
    {
        return empty($this->items(false));
    }
}
