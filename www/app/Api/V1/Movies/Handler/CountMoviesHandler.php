<?php declare(strict_types = 1);

namespace App\Api\V1\Movies\Handler;

use Apitte\Core\Http\ApiRequest;
use Apitte\Core\Http\ApiResponse;
use App\Application\Movie\CountMoviesUseCase;

class CountMoviesHandler
{

	public function __construct(
		private readonly CountMoviesUseCase $countMoviesUseCase,
	)
	{
	}

	public function handle(ApiRequest $request, ApiResponse $response): ApiResponse
	{
		$params = $request->getQueryParams();

		$name = $params['name'] ?? null;
		$description = $params['description'] ?? null;
		$director = $params['director'] ?? null;
		$genre = $params['genre'] ?? null;

		$response = $response->writeJsonBody([
			'totalCount' => $this->countMoviesUseCase->execute(
				$name,
				$description,
				$director,
				$genre,
			),
		]);

		return $response;
	}

}
