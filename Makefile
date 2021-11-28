run: composer_install run_cache_manager

test: composer_install
	docker compose run --rm cache_manager ./vendor/phpunit/phpunit/phpunit --verbose ./tests/TestCache.php
composer_install:
	docker compose run --rm cache_manager composer install
run_cache_manager: composer_install
	docker compose run --rm cache_manager php index.php
config:
	cp config.php.example config.php
prun:
	docker system prune -a
	docker volume prune
down:
	docker compose down