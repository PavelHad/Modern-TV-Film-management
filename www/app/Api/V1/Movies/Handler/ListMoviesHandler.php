<?php declare(strict_types = 1);

namespace App\Api\V1\Movies\Handler;

use Apitte\Core\Http\ApiRequest;
use Apitte\Core\Http\ApiResponse;
use App\Application\Movie\ListMoviesUseCase;

class ListMoviesHandler
{

	public function __construct(private readonly ListMoviesUseCase $listMoviesUseCase)
	{
	}

	public function handle(ApiRequest $request, ApiResponse $response): ApiResponse
	{
		$params = $request->getQueryParams();

		$offset = isset($params['offset']) ? (int) $params['offset'] : null;
		$limit = isset($params['limit']) ? (int) $params['limit'] : null;
		$id = $params['id'] ?? null;
		$name = $params['name'] ?? null;
		$description = $params['description'] ?? null;
		$director = $params['director'] ?? null;
		$genre = $params['genre'] ?? null;

		$movies = $this->listMoviesUseCase->execute(
			$offset,
			$limit,
			$id,
			$name,
			$description,
			$director,
			$genre,
		);

		$response = $response->writeJsonObject($movies);

		return $response;
	}

}
