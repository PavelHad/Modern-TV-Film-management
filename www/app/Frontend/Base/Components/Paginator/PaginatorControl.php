<?php declare(strict_types = 1);

namespace App\Frontend\Base\Components\Paginator;

use Nette\Application\UI\Control;
use function ceil;

class PaginatorControl extends Control
{

	private int $limit;

	private int $offset;

	public function __construct(
		private readonly int $totalItems,
		private readonly int $itemsPerPage,
		private int $actualPage,
	)
	{
		if ($this->actualPage < 1) {
			$this->actualPage = 1;
		}

		if ($this->actualPage > ceil($this->totalItems / $this->itemsPerPage)) {
			$this->actualPage = (int) ceil($this->totalItems / $this->itemsPerPage);
		}
	}

	public function render(): void
	{
		$totalPagesCount = ceil($this->totalItems / $this->itemsPerPage);

		$this->template->add('totalPagesCount', $totalPagesCount);
		$this->template->add('actualPage', $this->actualPage);
		$this->template->render(__DIR__ . '/paginator.latte');
	}

	public function getLimit(): int
	{
		return $this->itemsPerPage;
	}

	public function getOffset(): int
	{
		return ($this->actualPage - 1) * $this->itemsPerPage;
	}

}
