<?php declare(strict_types = 1);

namespace App\Application\Movie;

use App\Application\Movie\Response\MovieResponse;
use App\Application\Movie\Response\MovieResponseFactory;
use App\Domain\Movie\MovieId;
use App\Infrastructure\Domain\Movie\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;

readonly class UpdateMovieUseCase
{

	public function __construct(
		private MovieRepository $movieRepository,
		private EntityManagerInterface $entityManager,
		private MovieResponseFactory $movieResponseFactory,
	)
	{
	}

	public function execute(
		string $movieId,
		string $title,
		string $description,
		string $director,
		string $genre,
	): MovieResponse
	{
		$movieId = new MovieId($movieId);
		$movie = $this->movieRepository->get($movieId);

		$movie->update($title, $description, $director, $genre);

		$this->entityManager->flush();

		return $this->movieResponseFactory->create($movie->getDetail());
	}

}
