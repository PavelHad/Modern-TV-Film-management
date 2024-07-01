<?php declare(strict_types = 1);

namespace App\Api\V1\Movies\Handler;

use Apitte\Core\Http\ApiRequest;
use Apitte\Core\Http\ApiResponse;
use App\Api\V1\Authorization\AuthorizationService;
use App\Application\Movie\GetMovieUseCase;

class GetMovieHandler
{

	public function __construct(
		private readonly GetMovieUseCase $getMovieUseCase,
		private readonly AuthorizationService $authorizationService,
	)
	{
	}

	public function handle(ApiRequest $request, ApiResponse $response): ApiResponse
	{
		$token = $request->getHeader('Authorization');
		$this->authorizationService->authorize($token[0]);

		$id = $request->getParameter('id');

		$movieResponse = $this->getMovieUseCase->execute($id);

		$response = $response->writeJsonObject($movieResponse);

		return $response;
	}

}
