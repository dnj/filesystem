<?php

namespace dnj\Filesystem\Exceptions;

/**
 * @template T
 */
class IOException extends \Exception
{
    /**
     * @param T $target
     *
     * @return self<T>
     */
    public static function fromLastError($target): self
    {
        $error = error_get_last();
        if (!$error) {
            return new self($target);
        }

        return new self($target, $error['message']);
    }

    /** @var T */
    protected $target;

    /**
     * @param T $target
     */
    public function __construct($target, string $message = '', int $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->target = $target;
    }

    /**
     * @return T
     */
    public function getTarget()
    {
        return $this->target;
    }
}
