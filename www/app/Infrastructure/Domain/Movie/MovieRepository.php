<?php declare(strict_types = 1);

namespace App\Infrastructure\Domain\Movie;

use App\Domain\Movie\Exception\MovieNotFoundException;
use App\Domain\Movie\Movie;
use App\Domain\Movie\MovieId;
use App\Domain\Movie\MoviesDetailCollection;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\EntityManagerInterface;
use Happyr\DoctrineSpecification\Repository\EntitySpecificationRepository;
use Happyr\DoctrineSpecification\Specification\Specification;
use function array_map;
use function count;

/**
 * @extends EntitySpecificationRepository<Movie>
 */
class MovieRepository extends EntitySpecificationRepository
{

	public function __construct(EntityManagerInterface $em)
	{
		parent::__construct($em, $em->getClassMetadata(Movie::class));
	}

	/**
	 * @throws MovieNotFoundException
	 */
	public function get(MovieId $id): Movie
	{
		return $this->find($id) ?? throw new MovieNotFoundException($id);
	}

	public function add(Movie $movie): void
	{
		$this->getEntityManager()->persist($movie);
	}

	public function remove(Movie $movie): void
	{
		$this->getEntityManager()->remove($movie);
	}

	public function query(Specification $specification): MoviesDetailCollection
	{
		$query = $this->getQuery($specification);

		$result = $query->getResult();

		return new MoviesDetailCollection(
			count($result),
			...array_map(
				static fn (Movie $movie) => $movie->getDetail(),
				$result,
			),
		);
	}

	public function totalCount(Specification $specification): int
	{
		$query = $this->getQuery($specification);

		$result = $query->getResult(AbstractQuery::HYDRATE_ARRAY);

		return (int) count($result);
	}

}
