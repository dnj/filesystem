<?php

namespace dnj\Filesystem\Exceptions;

/**
 * @template T
 *
 * @extends IOException<T>
 */
class NotFoundException extends IOException
{
    /**
     * @param T $target
     */
    public function __construct($target, string $message = 'target was notfound', int $code = 0, \Throwable $previous = null)
    {
        parent::__construct($target, $message, $code, $previous);
    }
}
