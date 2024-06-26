<?php declare(strict_types = 1);

namespace App\Api\Movies;

use Apitte\Core\Annotation\Controller\Method;
use Apitte\Core\Annotation\Controller\Path;
use Apitte\Core\Http\ApiRequest;
use Apitte\Core\Http\ApiResponse;
use Apitte\Core\UI\Controller\IController;

/**
 * @Path("/api/v1/movies")
 */
class MoviesController implements IController
{

	/**
	 * @Path("/")
	 * @Method("GET")
	 */
	public function index(ApiRequest $request, ApiResponse $response): ApiResponse
	{
		$response = $response->writeJsonBody([
			[
				'id' => 1,
				'firstName' => 'John',
				'lastName' => 'Doe',
				'emailAddress' => 'john@doe.com',
			],
			[
				'id' => 2,
				'firstName' => 'Elon',
				'lastName' => 'Musk',
				'emailAddress' => 'elon.musk@spacex.com',
			],
		]);

		return $response;
	}

}
