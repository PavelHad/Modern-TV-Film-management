<?php declare(strict_types = 1);

namespace App\Application\Movie;

use App\Application\Movie\Response\MovieResponse;
use App\Application\Movie\Response\MovieResponseFactory;
use App\Domain\Movie\Movie;
use App\Infrastructure\Domain\Movie\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;

readonly class CreateMovieUseCase
{

	public function __construct(
		private MovieRepository $movieRepository,
		private MovieResponseFactory $movieResponseFactory,
		private EntityManagerInterface $entityManager,
	)
	{
	}

	public function execute(
		string $name,
		string $description,
		string $director,
		string $genre,
	): MovieResponse
	{
		$movie = new Movie(
			name: $name,
			description: $description,
			director: $director,
			genre: $genre,
		);

		$this->movieRepository->add($movie);
		$this->entityManager->flush();

		return $this->movieResponseFactory->create($movie->getDetail());
	}

}
