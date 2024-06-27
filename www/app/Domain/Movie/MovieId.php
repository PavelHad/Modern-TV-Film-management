<?php declare(strict_types = 1);

namespace App\Domain\Movie;

use Ramsey\Uuid\Uuid;

readonly class MovieId
{

	public function __construct(private string $value)
	{
	}

	public static function create(): self
	{
		return new self(
			Uuid::uuid4()->toString(),
		);
	}

	public function getValue(): string
	{
		return $this->value;
	}

	public function equals(self $to): bool
	{
		return $this->getValue() === $to->getValue();
	}

	public function __toString(): string
	{
		return $this->getValue();
	}

}
