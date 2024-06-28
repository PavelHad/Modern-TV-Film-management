<?php declare(strict_types = 1);

namespace App\Domain\Movie\Specification;

use App\Domain\Collection\Specification\Paginate;
use Happyr\DoctrineSpecification\Spec;
use Happyr\DoctrineSpecification\Specification\BaseSpecification;
use Happyr\DoctrineSpecification\Specification\Specification;

class MovieFilter extends BaseSpecification
{

	/** @var array<Specification> */
	private array $conditions;

	public function __construct(Specification ...$conditions)
	{
		parent::__construct();
		$this->conditions = $conditions;
	}

	public static function create(): self
	{
		return new self();
	}

	public function paginate(?int $limit, ?int $offset): self
	{
		return new self(
			new Paginate($limit, $offset),
			...$this->conditions,
		);
	}

	public function byId(string $id): self
	{
		return new self(
			new FilterById($id),
			...$this->conditions,
		);
	}

	public function byNameLike(string $name): self
	{
		return new self(
			new FilterByNameLike($name),
			...$this->conditions,
		);
	}

	public function byDescriptionLike(string $description): self
	{
		return new self(
			new FilterByDescriptionLike($description),
			...$this->conditions,
		);
	}

	public function byGenreLike(string $genre): self
	{
		return new self(
			new FilterByGenreLike($genre),
			...$this->conditions,
		);
	}

	public function byDirectorLike(string $director): self
	{
		return new self(
			new FilterByDirectorLike($director),
			...$this->conditions,
		);
	}

	public function orderBy(string $orderBy, string $direction, ?string $context = null): self
	{
		return new self(
			Spec::andX(Spec::orderBy($orderBy, $direction, $context)),
			...$this->conditions,
		);
	}

	protected function getSpec()
	{
		return Spec::andX(...$this->conditions);
	}

}
