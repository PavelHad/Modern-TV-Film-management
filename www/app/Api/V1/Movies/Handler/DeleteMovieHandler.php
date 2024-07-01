<?php declare(strict_types = 1);

namespace App\Api\V1\Movies\Handler;

use Apitte\Core\Http\ApiRequest;
use Apitte\Core\Http\ApiResponse;
use App\Api\V1\Authorization\AuthorizationService;
use App\Application\Movie\DeleteMovieUseCase;

class DeleteMovieHandler
{

	public function __construct(
		private readonly DeleteMovieUseCase $deleteMovieUseCase,
		private readonly AuthorizationService $authorizationService,
	)
	{
	}

	public function handle(ApiRequest $request, ApiResponse $response): ApiResponse
	{
		$token = $request->getHeader('Authorization');
		$this->authorizationService->authorize($token[0]);

		$id = $request->getParameter('id');

		$this->deleteMovieUseCase->execute($id);

		$response = $response->writeJsonBody(['message' => 'Movie deleted successfully']);

		return $response;
	}

}
