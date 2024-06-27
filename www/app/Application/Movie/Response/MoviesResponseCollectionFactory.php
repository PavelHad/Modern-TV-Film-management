<?php declare(strict_types = 1);

namespace App\Application\Movie\Response;

use App\Domain\Movie\MovieDetail;
use App\Domain\Movie\MoviesDetailCollection;
use function array_map;

readonly class MoviesResponseCollectionFactory
{

	public function __construct(private MovieResponseFactory $movieResponseFactory)
	{
	}

	public function create(MoviesDetailCollection $moviesCollection): MoviesResponseCollection
	{
		return new MoviesResponseCollection(
			$moviesCollection->totalCount,
			...array_map(
				fn (MovieDetail $movieDetail) => $this->movieResponseFactory->create($movieDetail),
				$moviesCollection->movies,
			),
		);
	}

}
