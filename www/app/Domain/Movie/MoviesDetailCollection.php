<?php declare(strict_types = 1);

namespace App\Domain\Movie;

readonly class MoviesDetailCollection
{

	/** @var array<MovieDetail> */
	public array $movies;

	public function __construct(public int $totalCount, MovieDetail ...$movies)
	{
		$this->movies = $movies;
	}

}
