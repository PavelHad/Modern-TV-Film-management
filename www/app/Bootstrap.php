<?php declare(strict_types = 1);

namespace App;

use Nette\Bootstrap\Configurator;
use function dirname;

class Bootstrap
{

	public static function boot(): Configurator
	{
		$configurator = new Configurator();
		$appDir = dirname(__DIR__);

		$configurator->setDebugMode(true); // enable for your remote IP
		$configurator->enableTracy($appDir . '/log');

		$configurator->setTempDirectory($appDir . '/temp');

		$configurator->createRobotLoader()
			->addDirectory(__DIR__)
			->register();

		$configurator->addStaticParameters([
			'rootDir' => __DIR__ . '/..',
		]);

		$configurator->addConfig($appDir . '/config/common.neon');
		$configurator->addConfig($appDir . '/config/services.neon');
		$configurator->addConfig($appDir . '/config/local.neon');
		$configurator->addConfig($appDir . '/config/apitte.neon');
		$configurator->addConfig($appDir . '/config/doctrine.neon');

		return $configurator;
	}

}
