<?php declare(strict_types = 1);

namespace App\Application\Movie;

use App\Application\Movie\Response\MoviesResponseCollection;
use App\Application\Movie\Response\MoviesResponseCollectionFactory;
use App\Domain\Movie\Specification\MovieFilter;
use App\Infrastructure\Domain\Movie\MovieRepository;

readonly class ListMoviesUseCase
{

	public function __construct(
		private MovieRepository $movieRepository,
		private MoviesResponseCollectionFactory $moviesResponseCollectionFactory,
	)
	{
	}

	public function execute(
		?int $offset,
		?int $limit,
		?string $id,
		?string $name,
		?string $description,
		?string $director,
		?string $genre,
	): MoviesResponseCollection
	{
		$filter = MovieFilter::create()
			->orderBy('name', 'ASC')
			->paginate($limit, $offset);

		if ($id !== null) {
			$filter = $filter->byId($id);
		}

		if ($name !== null) {
			$filter = $filter->byNameLike($name);
		}

		if ($description !== null) {
			$filter = $filter->byDescriptionLike($description);
		}

		if ($director !== null) {
			$filter = $filter->byDirectorLike($director);
		}

		if ($genre !== null) {
			$filter = $filter->byGenreLike($genre);
		}

		$movies = $this->movieRepository->query($filter);

		return $this->moviesResponseCollectionFactory->create($movies);
	}

}
