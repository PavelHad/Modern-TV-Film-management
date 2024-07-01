<?php declare(strict_types = 1);

namespace App\Sdk\Authorization;

use App\Sdk\Authorization\Exception\UnauthorizedUserException;

interface AccessTokenProvider
{

	/**
	 * @throws UnauthorizedUserException
	 */
	public function getAccessToken(): string;

}
