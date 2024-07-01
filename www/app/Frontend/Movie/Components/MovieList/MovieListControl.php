<?php declare(strict_types = 1);

namespace App\Frontend\Movie\Components\MovieList;

use App\Frontend\Base\Components\Paginator\PaginatorControl;
use App\Frontend\Base\Components\Paginator\PaginatorControlFactory;
use App\Frontend\Movie\Components\MovieForm\MovieFormControlFactory;
use App\Sdk\Client\SdkClient;
use App\Sdk\Resources\Movies\Response\MovieResponse;
use Nette\Application\UI\Control;
use Nette\Localization\Translator;

class MovieListControl extends Control
{

	public const ITEMS_PER_PAGE = 7;

	private PaginatorControl $paginatorControl;

	private int $page = 1;

	public function __construct(
		private readonly SdkClient $sdkClient,
		private readonly MovieFormControlFactory $movieFormControlFactory,
		private readonly PaginatorControlFactory $paginatorControlFactory,
		private readonly Translator $translator,
	)
	{
	}

	private function getPageParameter(): void
	{
		$this->page = (int) $this->presenter->getParameter('page');

		if ($this->page == 0) {
			$this->page = 1;
		}
	}

	public function createComponentMovieFormControl(): Control
	{
		return $this->movieFormControlFactory->create(
			function (MovieResponse $movieResponse): void {
				$this->presenter->flashMessage(
					$this->translator->translate('movie.movie_successfully_created'),
					'success',
				);
				$this->presenter->redirect('this');
			},
		);
	}

	public function createComponentPaginatorControl(): Control
	{
		return $this->paginatorControl;
	}

	public function handleDelete(string $id): void
	{
		$this->sdkClient->deleteMovie($id);

		$this->flashMessage(
			$this->translator->translate('_movie.movie_successfully_deleted'),
			'success',
		);
		$this->presenter->redirect('this');
	}

	public function render(): void
	{
		$this->getPageParameter();

		$name = $this->presenter->getParameter('name');
		$description = $this->presenter->getParameter('description');
		$genre = $this->presenter->getParameter('genre');
		$director = $this->presenter->getParameter('director');

		$totalItemsCount = $this->sdkClient->countMovies(
			name: $name,
			description: $description,
			genre: $genre,
			director: $director,
		)->getCount();

		$this->paginatorControl = $this->paginatorControlFactory->create(
			$totalItemsCount,
			self::ITEMS_PER_PAGE,
			$this->page,
		);

		$movies = $this->sdkClient->listMovies(
			name: $name,
			description: $description,
			genre: $genre,
			director: $director,
			limit: $this->paginatorControl->getLimit(),
			offset: $this->paginatorControl->getOffset(),
		);

		$this->template->add('movies', $movies);
		$this->template->render(__DIR__ . '/movieList.latte');
	}

}
