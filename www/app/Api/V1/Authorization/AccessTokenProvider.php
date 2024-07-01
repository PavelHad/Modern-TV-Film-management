<?php declare(strict_types = 1);

namespace App\Api\V1\Authorization;

use App\Api\V1\Authorization\Exception\UnauthorizedUserException;

interface AccessTokenProvider
{

	/**
	 * @throws UnauthorizedUserException
	 */
	public function getAccessToken(): string;

}
