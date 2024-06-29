<?php declare(strict_types = 1);

namespace App\Sdk\Client;

use App\Sdk\Resources\Movies\Request\CountMoviesRequest;
use App\Sdk\Resources\Movies\Request\CreateMovieRequest;
use App\Sdk\Resources\Movies\Request\DeleteMovieRequest;
use App\Sdk\Resources\Movies\Request\GetMovieRequest;
use App\Sdk\Resources\Movies\Request\ListMoviesRequest;
use App\Sdk\Resources\Movies\Request\UpdateMovieRequest;
use App\Sdk\Resources\Movies\Response\ListMoviesResponse;
use App\Sdk\Resources\Movies\Response\MovieResponse;
use App\Sdk\Resources\Response\CountResponse;
use GuzzleHttp\Client;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class SdkClient implements ClientInterface
{

	public function __construct(private readonly Client $httpClient)
	{
	}

	public function createMovie(
		?string $name,
		?string $description,
		?string $director,
		?string $genre,
	): MovieResponse
	{
		$response = $this->send(
			new CreateMovieRequest(
				$name,
				$description,
				$director,
				$genre,
			),
		);

		return MovieResponse::create($response);
	}

	public function getMovie(string $id): MovieResponse
	{
		$response = $this->send(
			new GetMovieRequest($id),
		);

		return MovieResponse::create($response);
	}

	public function listMovies(
		?string $id = null,
		?string $name = null,
		?string $description = null,
		?string $director = null,
		?string $genre = null,
		?int $limit = null,
		?int $offset = null,
	): ListMoviesResponse
	{
		$response = $this->send(
			new ListMoviesRequest(
				$id,
				$name,
				$description,
				$director,
				$genre,
				$limit,
				$offset,
			),
		);

		return ListMoviesResponse::create($response);
	}

	public function countMovies(
		?string $name,
		?string $description,
		?string $director,
		?string $genre,
	): CountResponse
	{
		$response = $this->send(
			new CountMoviesRequest(
				$name,
				$description,
				$director,
				$genre,
			),
		);

		return CountResponse::create($response);
	}

	public function deleteMovie(string $id): ResponseInterface
	{
		return $this->send(
			new DeleteMovieRequest($id),
		);
	}

	public function updateMovie(
		string $id,
		?string $name,
		?string $description,
		?string $director,
		?string $genre,
	): MovieResponse
	{
		$response = $this->send(
			new UpdateMovieRequest(
				$id,
				$name,
				$description,
				$director,
				$genre,
			),
		);

		return MovieResponse::create($response);
	}

	private function send(RequestInterface $request): ResponseInterface
	{
		return $this->sendRequest($request);
	}

	public function sendRequest(RequestInterface $request): ResponseInterface
	{
		$accessToken = '';
		$request->withAddedHeader('Authorization', 'Bearer ' . $accessToken);

		return $this->httpClient->sendRequest($request);
	}

}
