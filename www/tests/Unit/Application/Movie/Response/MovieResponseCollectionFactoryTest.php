<?php declare(strict_types = 1);

namespace Application\Movie\Response;

use App\Application\Movie\Response\MovieResponseFactory;
use App\Application\Movie\Response\MoviesResponseCollectionFactory;
use App\Domain\Movie\MovieDetail;
use App\Domain\Movie\MovieId;
use App\Domain\Movie\MoviesDetailCollection;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class MovieResponseCollectionFactoryTest extends TestCase
{

	public function testCreate(): void
	{
		$movieDetail1 = new MovieDetail(
			id: new MovieId('001'),
			name: 'Movie 1',
			description: 'Description 1',
			director: 'Director 1',
			genre: 'Genre 1',
			createdAt: new DateTimeImmutable(),
			updatedAt: new DateTimeImmutable(),
		);

		$movieDetail2 = new MovieDetail(
			id: new MovieId('002'),
			name: 'Movie 2',
			description: 'Description 2',
			director: 'Director 2',
			genre: 'Genre 2',
			createdAt: new DateTimeImmutable(),
			updatedAt: new DateTimeImmutable(),
		);

		$movieDetails = [
			$movieDetail1,
			$movieDetail2,
		];

		$moviesDetailCollection = new MoviesDetailCollection(
			2,
			...$movieDetails,
		);

		$movieResponseFactory = new MovieResponseFactory();
		$moviesResponseCollectionFactory = new MoviesResponseCollectionFactory($movieResponseFactory);

		$moviesResponseCollection = $moviesResponseCollectionFactory->create($moviesDetailCollection);

		self::assertSame(2, $moviesResponseCollection->totalCount);
		self::assertSame('002', $moviesResponseCollection->movies[1]->id);
		self::assertSame('Movie 2', $moviesResponseCollection->movies[1]->name);
		self::assertSame('Description 2', $moviesResponseCollection->movies[1]->description);
		self::assertSame('Director 2', $moviesResponseCollection->movies[1]->director);
		self::assertSame('Genre 2', $moviesResponseCollection->movies[1]->genre);
	}

}
