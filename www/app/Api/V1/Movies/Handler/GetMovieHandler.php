<?php declare(strict_types = 1);

namespace App\Api\V1\Movies\Handler;

use Apitte\Core\Http\ApiRequest;
use Apitte\Core\Http\ApiResponse;
use App\Application\Movie\GetMovieUseCase;

class GetMovieHandler
{

	public function __construct(private readonly GetMovieUseCase $getMovieUseCase)
	{
	}

	public function handle(ApiRequest $request, ApiResponse $response): ApiResponse
	{
		$id = $request->getParameter('id');
		$token = $request->getHeader('Authorization');

		$movieResponse = $this->getMovieUseCase->execute($id);

		$response = $response->writeJsonObject($movieResponse);

		return $response;
	}

}
