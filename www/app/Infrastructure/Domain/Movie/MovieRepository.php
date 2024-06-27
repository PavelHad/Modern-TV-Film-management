<?php declare(strict_types = 1);

namespace App\Infrastructure\Domain\Movie;

use App\Domain\Movie\Movie;
use App\Domain\Movie\MovieId;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityManagerInterface;
use Happyr\DoctrineSpecification\Repository\EntitySpecificationRepository;
use Happyr\DoctrineSpecification\Specification\Specification;

/**
 * @extends EntitySpecificationRepository<Movie>
 */
class MovieRepository extends EntitySpecificationRepository
{

	public function __construct(EntityManagerInterface $em)
	{
		parent::__construct($em, $em->getClassMetadata(Movie::class));
	}

	public function get(MovieId $id): Movie
	{
		return $this->find($id);
	}

	public function add(Movie $movie): void
	{
		$this->getEntityManager()->persist($movie);
	}

	public function remove(Movie $movie): void
	{
		$this->getEntityManager()->remove($movie);
	}

	/**
	 * @return Collection<Movie>
	 */
	public function query(Specification $specification): Collection
	{
		$query = $this->getQuery($specification);

		return new ArrayCollection($query->getResult());
	}

}
