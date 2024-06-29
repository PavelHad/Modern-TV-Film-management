<?php declare(strict_types = 1);

namespace App\Api\V1\Movies\Handler;

use Apitte\Core\Http\ApiRequest;
use Apitte\Core\Http\ApiResponse;
use App\Application\Movie\UpdateMovieUseCase;

class UpdateMovieHandler
{

	public function __construct(private readonly UpdateMovieUseCase $updateMovieUseCase)
	{
	}

	public function handle(ApiRequest $request, ApiResponse $response): ApiResponse
	{
		$body = $request->getJsonBody();

		$movie = $this->updateMovieUseCase->execute(
			$request->getParameter('id'),
			$body['name'],
			$body['description'],
			$body['director'],
			$body['genre'],
		);

		$response = $response->writeJsonObject($movie);

		return $response;
	}

}
