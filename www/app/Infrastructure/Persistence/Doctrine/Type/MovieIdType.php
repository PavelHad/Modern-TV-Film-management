<?php declare(strict_types = 1);

namespace App\Infrastructure\Persistence\Doctrine\Type;

use App\Domain\Movie\MovieId;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use Exception;
use function is_string;

class MovieIdType extends Type
{

	public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
	{
		return $platform->getStringTypeDeclarationSQL($column);
	}

	public function convertToDatabaseValue($value, AbstractPlatform $platform): string
	{
		if ( !$value instanceof MovieId) {
			throw new Exception('Invalid mapping type');
		}

		return $value->getValue();
	}

	public function convertToPHPValue($value, AbstractPlatform $platform): MovieId
	{
		if ( !is_string($value)) {
			throw new Exception('Invalid mapping type');
		}

		return new MovieId($value);
	}

	public function getName(): string
	{
		return 'app.movie.movieId';
	}

}
