<?php declare(strict_types = 1);

namespace App\Domain\Movie;

use DateTimeImmutable;

class Movie
{

	private MovieId $id;

	private DateTimeImmutable $createdAt;

	private DateTimeImmutable $updatedAt;

	public function __construct(
		private string $name,
		private string $description,
		private string $director,
		private string $genre,
	)
	{
		$this->id = MovieId::create();
		$this->createdAt = new DateTimeImmutable();
		$this->updatedAt = new DateTimeImmutable();
	}

	public function getDetail(): MovieDetail
	{
		return new MovieDetail(
			id: $this->id,
			name: $this->name,
			description: $this->description,
			director: $this->director,
			genre: $this->genre,
			createdAt: $this->createdAt,
			updatedAt: $this->updatedAt,
		);
	}

	public function update(
		string $name,
		string $description,
		string $director,
		string $genre,
	): void
	{
		$this->name = $name;
		$this->description = $description;
		$this->director = $director;
		$this->genre = $genre;
		$this->updatedAt = new DateTimeImmutable();
	}

}
