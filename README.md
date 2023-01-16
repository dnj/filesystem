# PHP FileSystem

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]][link-license]
[![Total Downloads][ico-downloads]][link-downloads]
### The Filesystem component provides basic utilities for the filesystem and the start point of creating any filesystem

## Introduction 

This is a repository intended to serve as a starting point if you want to bootstrap a filesystem in PHP. 
 
It could be useful if you want to implement a filesystem. The idea is that you don't have to worry about the basic structure of a filesystem.
We 
Just implement this contracts and have your own filesystem!\
We have to 
* Latest versions of PHP and PHPUnit
* Best practices applied:
  * [`README.md`][link-readme] (badges included)
  * [`LICENSE`][link-license]
  * [`composer.json`][link-composer-json]
  * [`phpunit.xml`][link-phpunit]
  * [`.gitignore`][link-gitignore]
* Some useful resources to start coding

## How To Start
First, You should decide what kind of filesystem you decide to create, Like: Local, TMP, S3, FTP or any file system you decide to create.
Note: we implement some filesystems that you can use them:\
[GitHub: All DNJ implemented filesystems][link-dnj-filesystems]

Create new project and require `dnj/filesystem` , so run:
```bash
composer require dnj/filesystem
```
Then, You should implement two interface, [IDirectory][interface-idirectory-link] and [IFile][interface-ifile-link] \
Note: The above interfaces is extended from See: [INode][interface-inode-link]

### [INode][interface-inode-link] methods:
* `getBasename(): string`
* `getDirname(): string`
* `getPath(): string`
* `getRelativePath(IDirectory $base): string`
* `exists(): bool`
* `getDirectory(): IDirectory`
* `delete(): void`
* `rename(string $newName): void`

### [IDirectory][interface-idirectory-link] methods:
* `files(bool $recursively): Iterator<IFile|IDirectory>`
* `items(bool $recursively): Iterator<IFile>`
* `directories(bool $recursively): Iterator<IDirectory>`
* `make(bool $recursively): void`
* `size(bool $recursively): int`
* `move(IDirectory $dest): void`
* `file(string $name): IFile`
* `directory(string $name): IDirectory`
* `isEmpty(): bool`
* `copyTo(IDirectory $dest): void`
* `copyFrom(IDirectory $source): void`

### [IFile][interface-ifile-link] methods:
* `copyTo(IFile $dest): void`
* `copyFrom(IFile $source): void`
* `move(IFile $dest): void`
* `read(int $length = 0): string`
* `write(string $data): void`
* `size(): int`
* `getExtension(): string`
* `isEmpty(): bool`
* `md5(bool $raw): string`
* `sha1(bool $raw): string`


## Helpful resources
We implement some parts of the above interfaces that you can use them:\
Directory Abstract: [Directory][src-directory-link] \
File Abstract: [File][src-file-link] \
Node Abstract: [Node][src-node-link] 

## Example implementation:
Directory:
```php
<?php
namespace YOUR_NAMESPACE\YOUR_FILESYSTEM;

use dnj\Filesystem\Directory as DirectoryAbstract;

class Directory extends DirectoryAbstract
{
    public function make(bool $recursively = true): void
    {
        ...
    }
    .
    .
    .
}
```

File:
```php
namespace YOUR_NAMESPACE\YOUR_FILESYSTEM;

use dnj\Filesystem\File as FileAbstract;

class Directory extends FileAbstract
{
    public function write(string $data): void
    {
        ...
    }
    public function read(int $length = 0): string
    {
        ...
    }
    .
    .
    .
}
```

## DNJ implemented filesystems:
You can find all implemented filesystems by DNJ by following [GitHub][link-dnj-filesystems]

Local FileSystem By DNJ: [Github Repository][repo-dnj-local-filesystem]

Temporary FileSystem By DNJ: [Github Repository][repo-dnj-tmp-filesystem]

S3 FileSystem By DNJ: [Github Repository][repo-dnj-s3-filesystem]

## More resources
### PHP 8

* [PHP 8 new features](http://php.net/manual/en/migration80.new-features.php)

### PHPUnit

* [Introduction to writing tests for PHPUnit](https://phpunit.de/manual/current/en/writing-tests-for-phpunit.html)
* [Testing exceptions with PHPUnit](https://phpunit.de/manual/current/en/writing-tests-for-phpunit.html#writing-tests-for-phpunit.exceptions)
* [PHPUnit assertions](https://phpunit.de/manual/current/en/appendixes.assertions.html)

## About
We'll try to maintain this project as simple as possible, but Pull Requests are welcomed!

## License

The MIT License (MIT). Please see [License File][link-license] for more information.

[ico-version]: https://img.shields.io/packagist/v/dnj/filesystem.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/dnj/filesystem.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/dnj/filesystem
[link-license]: https://github.com/dnj/filesystem/blob/master/LICENSE
[link-downloads]: https://packagist.org/packages/dnj/filesystem
[link-readme]: https://github.com/dnj/filesystem/blob/master/README.md
[link-composer-json]: https://github.com/dnj/filesystem/blob/master/composer.json
[link-phpunit]: https://github.com/dnj/filesystem/blob/master/phpunit.xml
[link-gitignore]: https://github.com/dnj/filesystem/blob/master/.gitignore
[link-author]: https://github.com/dnj
[link-dnj-filesystems]: https://github.com/orgs/dnj/repositories?q=-filesystem

[interface-idirectory-link]: https://github.com/dnj/filesystem/blob/master/src/Contracts/IDirectory.php
[interface-ifile-link]: https://github.com/dnj/filesystem/blob/master/src/Contracts/IDirectory.php
[interface-inode-link]: https://github.com/dnj/filesystem/blob/master/src/Contracts/INode.php
[src-directory-link]: https://github.com/dnj/filesystem/blob/master/src/Directory.php
[src-file-link]: https://github.com/dnj/filesystem/blob/master/src/File.php
[src-node-link]: https://github.com/dnj/filesystem/blob/master/src/Node.php

[repo-dnj-s3-filesystem]: https://github.com/dnj/s3-filesystem
[repo-dnj-local-filesystem]: https://github.com/dnj/local-filesystem
[repo-dnj-tmp-filesystem]: https://github.com/dnj/tmp-filesystem 
