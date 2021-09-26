<?php

namespace dnj\Filesystem\Contracts;

interface IFile extends INode
{
    public function copyTo(IFile $dest): void;

    public function copyFrom(IFile $source): void;

    public function move(IFile $dest): void;

    public function read(int $length = 0): string;

    public function write(string $data): void;

    public function size(): int;

    public function getExtension(): string;

    public function isEmpty(): bool;

    public function md5(bool $raw): string;

    public function sha1(bool $raw): string;
}
