<?php declare(strict_types = 1);

namespace App\Application\Movie;

use App\Application\Movie\Response\MovieResponse;
use App\Application\Movie\Response\MovieResponseFactory;
use App\Domain\Movie\MovieId;
use App\Infrastructure\Domain\Movie\MovieRepository;

class GetMovieUseCase
{

	public function __construct(
		private MovieRepository $movieRepository,
		private MovieResponseFactory $movieResponseFactory,
	)
	{
	}

	public function execute(string $movieId): MovieResponse
	{
		$movieId = new MovieId($movieId);
		$movie = $this->movieRepository->get($movieId);

		return $this->movieResponseFactory->create($movie->getDetail());
	}

}
