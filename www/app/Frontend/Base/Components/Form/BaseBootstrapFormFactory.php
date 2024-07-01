<?php declare(strict_types = 1);

namespace App\Frontend\Base\Components\Form;

use Contributte\FormsBootstrap\BootstrapForm;
use Contributte\FormsBootstrap\Enums\BootstrapVersion;
use Nette\Localization\Translator;

class BaseBootstrapFormFactory
{

	public function __construct(private readonly Translator $translator)
	{
	}

	public function create(): BootstrapForm
	{
		BootstrapForm::switchBootstrapVersion(BootstrapVersion::V5);

		$form = new BootstrapForm();
		$form->setTranslator($this->translator);

		return $form;
	}

}
