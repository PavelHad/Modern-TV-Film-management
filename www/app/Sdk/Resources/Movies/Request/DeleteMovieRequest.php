<?php declare(strict_types = 1);

namespace App\Sdk\Resources\Movies\Request;

use GuzzleHttp\Psr7\Request;

class DeleteMovieRequest extends Request
{

	public function __construct(string $id)
	{
		$uri = 'movies/' . $id;

		parent::__construct('DELETE', $uri);
	}

}
