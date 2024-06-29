<?php declare(strict_types = 1);

namespace App\Api\V1\Movies;

use Apitte\Core\Annotation\Controller\Method;
use Apitte\Core\Annotation\Controller\Path;
use Apitte\Core\Annotation\Controller\RequestParameter;
use Apitte\Core\Annotation\Controller\RequestParameters;
use Apitte\Core\Http\ApiRequest;
use Apitte\Core\Http\ApiResponse;
use Apitte\Core\UI\Controller\IController;
use App\Api\V1\Movies\Handler\CountMoviesHandler;
use App\Api\V1\Movies\Handler\CreateMovieHandler;
use App\Api\V1\Movies\Handler\DeleteMovieHandler;
use App\Api\V1\Movies\Handler\GetMovieHandler;
use App\Api\V1\Movies\Handler\ListMoviesHandler;
use App\Api\V1\Movies\Handler\UpdateMovieHandler;

/**
 * @Path("/api/v1/movies")
 */
class MoviesController implements IController
{

	public function __construct(
		private readonly GetMovieHandler $getMovieHandler,
		private readonly ListMoviesHandler $listMoviesHandler,
		private readonly CreateMovieHandler $createMovieHandler,
		private readonly UpdateMovieHandler $updateMovieHandler,
		private readonly DeleteMovieHandler $deleteMovieHandler,
		private readonly CountMoviesHandler $countMoviesHandler,
	)
	{
	}

	/**
	 * @Path("/{id}")
	 * @Method("GET")
	 * @RequestParameters({
	 *      @RequestParameter(name="id", type="string", description="Movie ID")
	 * })
	 */
	public function get(ApiRequest $request, ApiResponse $response): ApiResponse
	{
		return $this->getMovieHandler->handle($request, $response);
	}

	/**
	 * @Path("/")
	 * @Method("GET")
	 */
	public function list(ApiRequest $request, ApiResponse $response): ApiResponse
	{
		return $this->listMoviesHandler->handle($request, $response);
	}

	/**
	 * @Path("/")
	 * @Method("POST")
	 */
	public function create(ApiRequest $request, ApiResponse $response): ApiResponse
	{
		return $this->createMovieHandler->handle($request, $response);
	}

	/**
	 * @Path("/{id}")
	 * @Method("PUT")
	 * @RequestParameters({
	 *      @RequestParameter(name="id", type="string", description="Movie ID")
	 * })
	 */
	public function update(ApiRequest $request, ApiResponse $response): ApiResponse
	{
		return $this->updateMovieHandler->handle($request, $response);
	}

	/**
	 * @Path("/{id}")
	 * @Method("DELETE")
	 * @RequestParameters({
	 *      @RequestParameter(name="id", type="string", description="Movie ID")
	 * })
	 */
	public function delete(ApiRequest $request, ApiResponse $response): ApiResponse
	{
		return $this->deleteMovieHandler->handle($request, $response);
	}

	/**
	 * @Path("/count")
	 * @Method("GET")
	 */
	public function count(ApiRequest $request, ApiResponse $response): ApiResponse
	{
		return $this->countMoviesHandler->handle($request, $response);
	}

}
