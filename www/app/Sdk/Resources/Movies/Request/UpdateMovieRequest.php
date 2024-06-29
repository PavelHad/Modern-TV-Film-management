<?php declare(strict_types = 1);

namespace App\Sdk\Resources\Movies\Request;

use GuzzleHttp\Psr7\Request;
use Nette\Utils\Json;

class UpdateMovieRequest extends Request
{

	public function __construct(
		string $id,
		?string $name,
		?string $description,
		?string $director,
		?string $genre,
	)
	{
		$uri = 'http://localhost/api/v1/movies/' . $id;

		$body = Json::encode([
			'name' => $name,
			'description' => $description,
			'director' => $director,
			'genre' => $genre,
		]);

		parent::__construct('PUT', $uri, [], $body);
	}

}
