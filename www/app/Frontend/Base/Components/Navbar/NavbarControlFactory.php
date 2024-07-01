<?php declare(strict_types = 1);

namespace App\Frontend\Base\Components\Navbar;

interface NavbarControlFactory
{

	public function create(): NavbarControl;

}
