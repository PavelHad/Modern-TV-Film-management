<?php declare(strict_types = 1);

namespace Tests\Unit\Application\Movie\Response;

use App\Application\Movie\Response\MovieResponseFactory;
use App\Domain\Movie\MovieDetail;
use App\Domain\Movie\MovieId;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class MovieResponseFactoryTest extends TestCase
{

	public function testCreate(): void
	{
		$movieResponseFactory = new MovieResponseFactory();

		$movieDetail = new MovieDetail(
			id: new MovieId('001'),
			name: 'name',
			description: 'description',
			director: 'director',
			genre: 'genre',
			createdAt: new DateTimeImmutable(),
			updatedAt: new DateTimeImmutable(),
		);

		$movieResponse = $movieResponseFactory->create($movieDetail);

		self::assertSame('001', $movieResponse->id);
		self::assertSame('name', $movieResponse->name);
		self::assertSame('description', $movieResponse->description);
		self::assertSame('director', $movieResponse->director);
		self::assertSame('genre', $movieResponse->genre);
	}

}
