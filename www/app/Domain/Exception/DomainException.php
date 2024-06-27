<?php declare(strict_types = 1);

namespace App\Domain\Exception;

use Exception;
use Throwable;

abstract class DomainException extends Exception
{

	public function __construct(string $message = '', Throwable|null $previous = null)
	{
		parent::__construct($message, 0, $previous);
	}

}
