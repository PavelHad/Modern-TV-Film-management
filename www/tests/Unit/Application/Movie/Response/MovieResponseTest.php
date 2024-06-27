<?php declare(strict_types = 1);

namespace Application\Movie\Response;

use App\Application\Movie\Response\MovieResponse;
use DateTimeImmutable;
use DateTimeInterface;
use PHPUnit\Framework\TestCase;

class MovieResponseTest extends TestCase
{

	public function testCreate(): void
	{
		$movieResponse = $this->createMovieResponse();

		$this->assertSame($movieResponse->id, '001');
		$this->assertSame($movieResponse->name, 'Name');
		$this->assertSame($movieResponse->description, 'Description');
		$this->assertSame($movieResponse->director, 'Director');
		$this->assertSame($movieResponse->genre, 'Genre');
	}

	public function testJsonSerialize(): void
	{
		$movieResponse = $this->createMovieResponse();

		$expected = [
			'id' => '001',
			'name' => 'Name',
			'description' => 'Description',
			'director' => 'Director',
			'genre' => 'Genre',
			'createdAt' => $movieResponse->createdAt->format(DateTimeInterface::W3C),
			'updatedAt' => $movieResponse->updatedAt->format(DateTimeInterface::W3C),
		];

		$this->assertSame($expected, $movieResponse->jsonSerialize());
	}

	public function createMovieResponse(): MovieResponse
	{
		$createdAt = new DateTimeImmutable();
		$updatedAt = new DateTimeImmutable();

		return new MovieResponse(
			id: '001',
			name: 'Name',
			description: 'Description',
			director: 'Director',
			genre: 'Genre',
			createdAt: $createdAt,
			updatedAt: $updatedAt,
		);
	}

}
