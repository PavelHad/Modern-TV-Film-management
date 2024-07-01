<?php declare(strict_types = 1);

namespace App\Frontend\Base\Dependency;

use App\Frontend\Base\Components\Navbar\NavbarControlFactory;
use Contributte\Translation\LocalesResolvers\Session;
use Nette\Localization\Translator;

class DependencyProvider
{

	public function __construct(
		private readonly Session $translatorSessionResolver,
		private readonly Translator $translator,
		private readonly NavbarControlFactory $navbarControlFactory,
	)
	{
	}

	public function getTranslatorSessionResolver(): Session
	{
		return $this->translatorSessionResolver;
	}

	public function getTranslator(): Translator
	{
		return $this->translator;
	}

	public function getNavbarControlFactory(): NavbarControlFactory
	{
		return $this->navbarControlFactory;
	}

}
