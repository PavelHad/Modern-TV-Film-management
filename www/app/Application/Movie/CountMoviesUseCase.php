<?php declare(strict_types = 1);

namespace App\Application\Movie;

use App\Domain\Movie\Specification\MovieFilter;
use App\Infrastructure\Domain\Movie\MovieRepository;

class CountMoviesUseCase
{

	public function __construct(private MovieRepository $movieRepository)
	{
	}

	public function execute(
		?string $name,
		?string $description,
		?string $director,
		?string $genre,
	): int
	{
		$filter = MovieFilter::create();

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

		return $this->movieRepository->totalCount($filter);
	}

}
