<?php declare(strict_types = 1);

namespace App\Frontend\Movie\Presenters;

use App\Frontend\Base\Dependency\DependencyProvider;
use App\Frontend\Base\Presenters\BasePresenter;
use App\Frontend\Movie\Components\MovieForm\MovieFormControl;
use App\Frontend\Movie\Components\MovieForm\MovieFormControlFactory;
use App\Frontend\Movie\Components\MovieList\MovieListControl;
use App\Frontend\Movie\Components\MovieList\MovieListControlFactory;
use App\Sdk\Client\SdkClient;
use App\Sdk\Resources\Movies\Response\MovieResponse;

class MoviePresenter extends BasePresenter
{

	public function __construct(
		DependencyProvider $dependencyProvider,
		private readonly MovieListControlFactory $movieListControlFactory,
		private readonly MovieFormControlFactory $movieFormControlFactory,
		private readonly SdkClient $sdkClient,
	)
	{
		parent::__construct($dependencyProvider);
	}

	public function createComponentMovieListControl(): MovieListControl
	{
		return $this->movieListControlFactory->create();
	}

	public function createComponentEditMovieFormControl(): MovieFormControl
	{
		$id = $this->getParameter('id');
		$movieResponse = $this->sdkClient->getMovie($id);

		return $this->movieFormControlFactory->create(
			function (MovieResponse $movieResponse): void {
				$this->flashMessage('Film úspěšně editován.', 'success');
				$this->redirect('Movie:list');
			},
			$movieResponse,
		);
	}

	public function actionDefault(): void
	{
		$this->redirect('Movie:list');
	}

	public function actionEdit(string $id): void
	{
	}

	public function actionList(): void
	{
	}

}
