<?php declare(strict_types = 1);

namespace App\Frontend\Base\Presenters;

use Nette\Application\UI\Presenter;

class BasePresenter extends Presenter
{

	public function beforeRender(): void
	{
		$this->setLayout(__DIR__ . '/../Layout/@layout.latte');
	}

}
