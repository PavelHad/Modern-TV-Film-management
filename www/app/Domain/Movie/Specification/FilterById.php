<?php declare(strict_types = 1);

namespace App\Domain\Movie\Specification;

use Happyr\DoctrineSpecification\Spec;
use Happyr\DoctrineSpecification\Specification\BaseSpecification;

class FilterById extends BaseSpecification
{

	public function __construct(private string $movieId, ?string $context = null)
	{
		parent::__construct($context);
	}

	protected function getSpec()
	{
		return Spec::eq('id', $this->movieId);
	}

}
