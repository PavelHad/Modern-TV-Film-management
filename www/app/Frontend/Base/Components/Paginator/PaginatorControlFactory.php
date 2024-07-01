<?php declare(strict_types = 1);

namespace App\Frontend\Base\Components\Paginator;

interface PaginatorControlFactory
{

	public function create(int $totalItems, int $itemsPerPage, int $actualPage): PaginatorControl;

}
