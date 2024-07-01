<?php declare(strict_types = 1);

namespace App\Frontend\Base\Presenters;

use App\Frontend\Base\Components\Navbar\NavbarControl;
use App\Frontend\Base\Components\Navbar\NavbarControlFactory;
use App\Frontend\Base\Dependency\DependencyProvider;
use Contributte\Translation\LocalesResolvers\Session;
use Nette\Application\UI\Presenter;
use Nette\Localization\Translator;

abstract class BasePresenter extends Presenter
{

	private readonly Session $translatorSessionResolver;

	private readonly Translator $translator;

	private readonly NavbarControlFactory $navbarControlFactory;

	public function __construct(DependencyProvider $dependencyProvider)
	{
		$this->translatorSessionResolver = $dependencyProvider->getTranslatorSessionResolver();
		$this->translator = $dependencyProvider->getTranslator();
		$this->navbarControlFactory = $dependencyProvider->getNavbarControlFactory();
	}

	public function startup(): void
	{
		parent::startup();

		if ($this->session->isStarted() === false) {
			$this->session->start();
		}

		$this->translatorSessionResolver->setLocale('cs');
		$this->translator->setLocale('cs');
	}

	public function createComponentNavbarControl(): NavbarControl
	{
		return $this->navbarControlFactory->create();
	}

	public function beforeRender(): void
	{
		$this->setLayout(__DIR__ . '/../Layout/@layout.latte');
	}

}
