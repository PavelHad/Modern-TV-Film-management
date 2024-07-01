<?php declare(strict_types = 1);

namespace App\Api\V1\Movies\Handler;

use Apitte\Core\Http\ApiRequest;
use Apitte\Core\Http\ApiResponse;
use App\Api\V1\Authorization\AuthorizationService;
use App\Application\Movie\CreateMovieUseCase;

class CreateMovieHandler
{

	public function __construct(
		private readonly CreateMovieUseCase $createMovieUseCase,
		private readonly AuthorizationService $authorizationService,
	)
	{
	}

	public function handle(ApiRequest $request, ApiResponse $response): ApiResponse
	{
		$token = $request->getHeader('Authorization');
		$this->authorizationService->authorize($token[0]);

		$body = $request->getJsonBody();

		$movie = $this->createMovieUseCase->execute(
			$body['name'],
			$body['description'],
			$body['director'],
			$body['genre'],
		);

		$response = $response->writeJsonObject($movie);

		return $response;
	}

}
