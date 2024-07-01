clean:
	rm -rf temp/cache
	rm -rf temp/proxies
	composer du

phpstan:
	php vendor/bin/phpstan analyse app --level 7

phpstan-baseline:
	php vendor/bin/phpstan analyse app --level 7 --generate-baseline phpstan-baseline.neon

phpunit:
	php ./vendor/bin/phpunit

cs:
	php vendor/bin/phpcs --standard=phpcs.xml app tests

cs-fix:
	php vendor/bin/phpcbf --standard=phpcs.xml app tests