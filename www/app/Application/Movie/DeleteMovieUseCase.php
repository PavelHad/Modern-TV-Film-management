<?php declare(strict_types = 1);

namespace App\Application\Movie;

use App\Domain\Movie\MovieId;
use App\Infrastructure\Domain\Movie\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;

readonly class DeleteMovieUseCase
{

	public function __construct(
		private MovieRepository $movieRepository,
		private EntityManagerInterface $entityManager,
	)
	{
	}

	public function execute(string $movieId): void
	{
		$movieId = new MovieId($movieId);
		$movie = $this->movieRepository->get($movieId);

		$this->movieRepository->remove($movie);
		$this->entityManager->flush();
	}

}
