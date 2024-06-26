clean:
	rm -rf temp/cache
	rm -rf temp/proxies
	composer du

phpstan:
	php vendor/bin/phpstan analyse app --level 7

phpunit:
	php ./vendor/bin/phpunit