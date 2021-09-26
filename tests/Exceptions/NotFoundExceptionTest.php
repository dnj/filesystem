<?php
namespace tests;

use PHPUnit\Framework\TestCase;
use dnj\Filesystem\Exceptions\NotFoundException;

final class NotFoundExceptionTest extends TestCase {
	public function testGetTarget(): void {
		$exception = new NotFoundException("some-thing");
		$this->assertSame("some-thing", $exception->getTarget());
	}
}
