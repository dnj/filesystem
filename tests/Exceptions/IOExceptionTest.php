<?php
namespace tests;

use PHPUnit\Framework\TestCase;
use dnj\Filesystem\Exceptions\IOException;

final class IOExceptionTest extends TestCase {
	public function testFromLastError(): void {
		$exception = IOException::fromLastError(null);
		$this->assertInstanceOf(IOException::class, $exception);
	}
	public function testGetTarget(): void {
		$exception = new IOException("some-thing");
		$this->assertSame("some-thing", $exception->getTarget());
	}
}
