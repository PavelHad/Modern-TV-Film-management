<?php declare(strict_types = 1);

namespace App\Domain\Movie\Specification;

use Happyr\DoctrineSpecification\Spec;
use Happyr\DoctrineSpecification\Specification\BaseSpecification;

class FilterByDescriptionLike extends BaseSpecification
{

	public function __construct(private string $description, ?string $context = null)
	{
		parent::__construct($context);
	}

	protected function getSpec()
	{
		return Spec::like('description', $this->description);
	}

}
