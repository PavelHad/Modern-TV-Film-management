<?php declare(strict_types = 1);

namespace App\Sdk\Resources\Movies\Response;

use Nette\Utils\Json;
use Psr\Http\Message\ResponseInterface;
use function array_map;

class ListMoviesResponse
{

	/** @var array<MovieResponse> */
	private array $items;

	public function __construct(private int $totalCount, MovieResponse ...$movies)
	{
		$this->items = $movies;
	}

	public static function create(ResponseInterface $response): self
	{
		$body = $response->getBody()->getContents();

		$response->getBody()->rewind();

		$decoded = Json::decode($body, true);

		$movieResponses = array_map(
			static fn (array $movieResponse) => MovieResponse::createFromArray($movieResponse),
			$decoded['items'],
		);

		return new self($decoded['totalCount'], ...$movieResponses);
	}

	public function getTotalCount(): int
	{
		return $this->totalCount;
	}

	/**
	 * @return array<MovieResponse>
	 */
	public function getItems(): array
	{
		return $this->items;
	}

}
