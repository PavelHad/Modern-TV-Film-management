<?php declare(strict_types = 1);

namespace App\Frontend\Movie\Components\MovieList;

interface MovieListControlFactory
{

	public function create(): MovieListControl;

}
