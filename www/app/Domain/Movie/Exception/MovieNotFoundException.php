<?php declare(strict_types = 1);

namespace App\Domain\Movie\Exception;

use App\Domain\Exception\NotFoundException;
use App\Domain\Movie\MovieId;
use Throwable;

class MovieNotFoundException extends NotFoundException
{

	public function __construct(MovieId $movieId, ?Throwable $previous = null)
	{
		parent::__construct("Movie with id={$movieId->getValue()} not found.", $previous);
	}

}
