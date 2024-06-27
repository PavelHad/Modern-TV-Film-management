<?php declare(strict_types = 1);

namespace App\Domain\Movie;

use DateTimeImmutable;

readonly class MovieDetail
{

	public function __construct(
		public MovieId $id,
		public string $name,
		public string $description,
		public string $director,
		public string $genre,
		public DateTimeImmutable $createdAt,
		public DateTimeImmutable $updatedAt,
	)
	{
	}

}
