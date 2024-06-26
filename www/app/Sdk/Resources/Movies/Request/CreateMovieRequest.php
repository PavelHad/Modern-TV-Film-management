<?php declare(strict_types = 1);

namespace App\Sdk\Resources\Movies\Request;

use GuzzleHttp\Psr7\Request;
use Nette\Utils\Json;

class CreateMovieRequest extends Request
{

	public function __construct(
		?string $name,
		?string $description,
		?string $director,
		?string $genre,
	)
	{
		$uri = 'movies';

		$body = Json::encode([
			'name' => $name,
			'description' => $description,
			'director' => $director,
			'genre' => $genre,
		]);

		parent::__construct('POST', $uri, [], $body);
	}

}
