<?php declare(strict_types = 1);

namespace App\Frontend\Base\Components\Navbar;

use Nette\Application\UI\Control;

class NavbarControl extends Control
{

	public function render(): void
	{
		$this->template->render(__DIR__ . '/navbar.latte');
	}

}
