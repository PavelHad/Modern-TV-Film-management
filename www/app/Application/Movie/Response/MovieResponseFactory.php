<?php declare(strict_types = 1);

namespace App\Application\Movie\Response;

use App\Domain\Movie\MovieDetail;

readonly class MovieResponseFactory
{

	public function create(MovieDetail $movieDetail): MovieResponse
	{
		return new MovieResponse(
			id: $movieDetail->id->getValue(),
			name: $movieDetail->name,
			description: $movieDetail->description,
			director: $movieDetail->director,
			genre: $movieDetail->genre,
			createdAt: $movieDetail->createdAt,
			updatedAt: $movieDetail->updatedAt,
		);
	}

}
