<?php declare(strict_types = 1);

namespace App\Api\V1\Movies\Handler;

use Apitte\Core\Http\ApiRequest;
use Apitte\Core\Http\ApiResponse;
use App\Application\Movie\DeleteMovieUseCase;

class DeleteMovieHandler
{

	public function __construct(private readonly DeleteMovieUseCase $deleteMovieUseCase)
	{
	}

	public function handle(ApiRequest $request, ApiResponse $response): ApiResponse
	{
		$id = $request->getParameter('id');
		$token = $request->getHeader('Authorization');

		$this->deleteMovieUseCase->execute($id);

		$response = $response->writeJsonBody(['message' => 'Movie deleted successfully']);

		return $response;
	}

}
