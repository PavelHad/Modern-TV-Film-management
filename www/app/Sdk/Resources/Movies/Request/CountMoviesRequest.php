<?php declare(strict_types = 1);

namespace App\Sdk\Resources\Movies\Request;

use GuzzleHttp\Psr7\Request;
use function array_filter;
use function http_build_query;

class CountMoviesRequest extends Request
{

	public function __construct(
		?string $name,
		?string $description,
		?string $director,
		?string $genre,
	)
	{
		$queryParams = array_filter([
			'name' => $name,
			'description' => $description,
			'director' => $director,
			'genre' => $genre,
		], static fn ($value): bool => $value !== null);

		$query = http_build_query($queryParams);

		$uri = 'http://localhost/api/v1/movies/count?' . $query;

		parent::__construct('GET', $uri);
	}

}
