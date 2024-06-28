<?php declare(strict_types = 1);

namespace App\Domain\Collection\Specification;

use Happyr\DoctrineSpecification\Spec;
use Happyr\DoctrineSpecification\Specification\BaseSpecification;

class Paginate extends BaseSpecification
{

	public const DEFAULT_LIMIT = 10;

	public const DEFAULT_OFFSET = 0;

	public function __construct(
		private ?int $limit,
		private ?int $offset,
		?string $context = null,
	)
	{
		parent::__construct($context);
	}

	protected function getSpec()
	{
		return Spec::andX(
			Spec::limit($this->limit ?? self::DEFAULT_LIMIT),
			new Offset($this->offset ?? self::DEFAULT_OFFSET),
		);
	}

}
