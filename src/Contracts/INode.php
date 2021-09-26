<?php

namespace dnj\Filesystem\Contracts;

interface INode extends \Serializable
{
    public function getBasename(): string;

    public function getDirname(): string;

    public function getPath(): string;

    public function getRelativePath(IDirectory $base): string;

    public function exists(): bool;

    public function getDirectory(): IDirectory;

    public function delete(): void;

    public function rename(string $newName): void;
}
