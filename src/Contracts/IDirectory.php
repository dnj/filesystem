<?php

namespace dnj\Filesystem\Contracts;

interface IDirectory extends INode
{
    /**
     * @return \Iterator<IFile>
     */
    public function files(bool $recursively): \Iterator;

    /**
     * @return \Iterator<IFile|IDirectory>
     */
    public function items(bool $recursively): \Iterator;

    /**
     * @return \Iterator<IDirectory>
     */
    public function directories(bool $recursively): \Iterator;

    public function make(bool $recursively): void;

    public function size(bool $recursively): int;

    public function move(IDirectory $dest): void;

    public function file(string $name): IFile;

    public function directory(string $name): IDirectory;

    public function isEmpty(): bool;

    public function copyTo(IDirectory $dest): void;

    public function copyFrom(IDirectory $source): void;
}
