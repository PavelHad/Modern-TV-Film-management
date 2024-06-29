<?php declare(strict_types = 1);

namespace App\Sdk\Resources\Movies\Request;

use GuzzleHttp\Psr7\Request;
use function array_filter;
use function http_build_query;

class ListMoviesRequest extends Request
{

	public function __construct(
		?string $id,
		?string $name,
		?string $description,
		?string $director,
		?string $genre,
		?int $limit,
		?int $offset,
	)
	{
		$queryParams = array_filter([
			'id' => $id,
			'name' => $name,
			'description' => $description,
			'director' => $director,
			'genre' => $genre,
			'limit' => $limit,
			'offset' => $offset,
		], static fn ($value): bool => $value !== null);

		$query = http_build_query($queryParams);

		$uri = 'http://localhost/api/v1/movies?' . $query;

		parent::__construct('GET', $uri);
	}

}
