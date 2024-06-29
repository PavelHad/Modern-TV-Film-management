<?php declare(strict_types = 1);

namespace App\Api\V1\Movies\Handler;

use Apitte\Core\Http\ApiRequest;
use Apitte\Core\Http\ApiResponse;
use App\Application\Movie\CreateMovieUseCase;

class CreateMovieHandler
{

	public function __construct(private readonly CreateMovieUseCase $createMovieUseCase)
	{
	}

	public function handle(ApiRequest $request, ApiResponse $response): ApiResponse
	{
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
