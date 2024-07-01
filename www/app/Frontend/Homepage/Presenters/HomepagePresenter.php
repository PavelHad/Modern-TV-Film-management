<?php declare(strict_types = 1);

namespace App\Frontend\Homepage\Presenters;

use App\Frontend\Base\Dependency\DependencyProvider;
use App\Frontend\Base\Presenters\BasePresenter;

final class HomepagePresenter extends BasePresenter
{

	public function __construct(
		private readonly DependencyProvider $dependencyProvider,
	)
	{
		parent::__construct($this->dependencyProvider);
	}

	public function actionDefault(): void
	{
	}

}
