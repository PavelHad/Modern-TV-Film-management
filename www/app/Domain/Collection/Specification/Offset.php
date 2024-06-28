<?php declare(strict_types = 1);

namespace App\Domain\Collection\Specification;

use Doctrine\ORM\QueryBuilder;
use Happyr\DoctrineSpecification\Query\QueryModifier;

/**
 * Happyr\DoctrineSpecification\Query\Offset
 *
 * I don't like what default offset implements,
 * so I decided to create my own offset
 */

final class Offset implements QueryModifier
{

	public function __construct(private int $offset)
	{
	}

	public function modify(QueryBuilder $qb, string $context): void
	{
		$qb->setFirstResult($this->offset);
	}

}
