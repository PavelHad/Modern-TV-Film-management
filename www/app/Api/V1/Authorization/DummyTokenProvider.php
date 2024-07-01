<?php declare(strict_types = 1);

namespace App\Api\V1\Authorization;

class DummyTokenProvider implements AccessTokenProvider
{

	public function getAccessToken(): string
	{
		return 'abc';
	}

}
