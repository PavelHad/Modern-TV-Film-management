<?php declare(strict_types = 1);

namespace App\Sdk\Authorization\Exception;

use Exception;
use Throwable;

class UnauthorizedUserException extends Exception
{

	public function __construct(?Throwable $previous = null)
	{
		parent::__construct('User is not authorized, access token not provided', 0, $previous);
	}

}
