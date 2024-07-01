<?php declare(strict_types = 1);

namespace App\Frontend\Movie\Components\MovieForm;

use App\Sdk\Resources\Movies\Response\MovieResponse;

interface MovieFormControlFactory
{

	public function create(
		callable $onSuccess,
		?MovieResponse $movieResponse = null,
	): MovieFormControl;

}
