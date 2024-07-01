<?php declare(strict_types = 1);

namespace App\Api\V1\Movies\Handler;

use Apitte\Core\Http\ApiRequest;
use Apitte\Core\Http\ApiResponse;
use App\Api\V1\Authorization\AuthorizationService;
use App\Application\Movie\CountMoviesUseCase;

class CountMoviesHandler
{

	public function __construct(
		private readonly CountMoviesUseCase $countMoviesUseCase,
		private readonly AuthorizationService $authorizationService,
	)
	{
	}

	public function handle(ApiRequest $request, ApiResponse $response): ApiResponse
	{
		$token = $request->getHeader('Authorization');
		$this->authorizationService->authorize($token[0]);

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
