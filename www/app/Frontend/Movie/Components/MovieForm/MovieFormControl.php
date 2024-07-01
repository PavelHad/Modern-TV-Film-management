<?php declare(strict_types = 1);

namespace App\Frontend\Movie\Components\MovieForm;

use App\Frontend\Base\Components\Form\BaseBootstrapFormFactory;
use App\Sdk\Client\SdkClient;
use App\Sdk\Resources\Movies\Response\MovieResponse;
use Contributte\FormsBootstrap\BootstrapForm;
use Nette\Application\UI\Control;
use Nette\Application\UI\Form;
use Nette\Utils\ArrayHash;
use function call_user_func;
use function is_callable;

class MovieFormControl extends Control
{

	private object $onSuccess;

	public function __construct(
		callable $onSuccess,
		private readonly ?MovieResponse $movieResponse,
		private readonly BaseBootstrapFormFactory $baseBootstrapFormFactory,
		private readonly SdkClient $sdkClient,
	)
	{
		$this->onSuccess = (object) $onSuccess;
	}

	public function createComponentMovieForm(): BootstrapForm
	{
		$form = $this->baseBootstrapFormFactory->create();

		$form->addText('name', 'movie.name')
			->setDefaultValue($this->movieResponse?->getName() ?? '')
			->setRequired();

		$form->addText('description', 'movie.description')
			->setDefaultValue($this->movieResponse?->getDescription() ?? '')
			->setRequired();

		$form->addText('genre', 'movie.genre')
			->setDefaultValue($this->movieResponse?->getGenre() ?? '')
			->setRequired();

		$form->addText('director', 'movie.director')
			->setDefaultValue($this->movieResponse?->getDirector() ?? '')
			->setRequired();

		$form->addSubmit(
			'submit',
			$this->movieResponse === null ? 'global.add' : 'global.edit',
		);

		$form->onSuccess[] = function (Form $form, ArrayHash $values): void {
			$movieResponse = $this->movieResponse === null ? $this->sdkClient->createMovie(
				$values['name'],
				$values['description'],
				$values['director'],
				$values['genre'],
			) : $this->sdkClient->updateMovie(
				$this->movieResponse->getId(),
				$values['name'],
				$values['description'],
				$values['director'],
				$values['genre'],
			);

			if (is_callable($this->onSuccess)) {
				call_user_func($this->onSuccess, $movieResponse);
			}
		};

		return $form;
	}

	public function render(): void
	{
		$this->template->render(__DIR__ . '/movieForm.latte');
	}

}
