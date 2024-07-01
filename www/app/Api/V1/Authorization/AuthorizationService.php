<?php declare(strict_types = 1);

namespace App\Api\V1\Authorization;

use App\Api\V1\Authorization\Exception\UnauthorizedUserException;

class AuthorizationService
{

	public function __construct(
		private AccessTokenProvider $accessTokenProvider,
	)
	{
	}

	public function authorize(string $accessToken): bool
	{
		$token = $this->accessTokenProvider->getAccessToken();
		if ($accessToken !== 'Bearer ' . $token) {
			throw new UnauthorizedUserException();
		}

		return true;
	}

}
