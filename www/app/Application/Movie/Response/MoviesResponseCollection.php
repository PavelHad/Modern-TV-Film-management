<?php declare(strict_types = 1);

namespace App\Application\Movie\Response;

use JsonSerializable;

readonly class MoviesResponseCollection implements JsonSerializable
{

	/** @var array<MovieResponse> */
	public array $movies;

	public function __construct(
		public int $totalCount,
		MovieResponse ...$movies,
	)
	{
		$this->movies = $movies;
	}

	/**
	 * @return array<string, mixed>
	 */
	public function jsonSerialize(): array
	{
		return [
			'totalCount' => $this->totalCount,
			'items' => $this->movies,
		];
	}

}
