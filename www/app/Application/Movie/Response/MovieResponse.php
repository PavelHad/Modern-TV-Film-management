<?php declare(strict_types = 1);

namespace App\Application\Movie\Response;

use DateTimeImmutable;
use DateTimeInterface;
use JsonSerializable;

readonly class MovieResponse implements JsonSerializable
{

	public function __construct(
		public string $id,
		public string $name,
		public string $description,
		public string $director,
		public string $genre,
		public DateTimeImmutable $createdAt,
		public DateTimeImmutable $updatedAt,
	)
	{
	}

	/**
	 * @return array<string, string>
	 */
	public function jsonSerialize(): array
	{
		return [
			'id' => $this->id,
			'name' => $this->name,
			'description' => $this->description,
			'director' => $this->director,
			'genre' => $this->genre,
			'createdAt' => $this->createdAt->format(DateTimeInterface::W3C),
			'updatedAt' => $this->updatedAt->format(DateTimeInterface::W3C),
		];
	}

}
