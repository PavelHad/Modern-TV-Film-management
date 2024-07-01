<?php declare(strict_types = 1);

namespace App\Sdk\Authorization;

class DummyTokenProvider implements AccessTokenProvider
{

	public function getAccessToken(): string
	{
		return 'Bearer abc';
	}

}
