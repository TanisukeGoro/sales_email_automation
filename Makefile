include .env

.PHONY: docker-reset-db
docker-reset-db:
	docker-compose exec app php artisan migrate:refresh --seed

.PHONY: reset-db
reset-db:
	php artisan migrate:refresh --seed

.PHONY: docker-down
docker-down:
	docker-compose down -v

.PHONY: docker-destory
docker-destory:
	docker-compose down -v --rmi all

.PHONY: docker-argon-update
docker-argon-update:
	docker-compose exec app composer require laravel-frontend-presets/argon
	docker-compose exec app php artisan preset argon:update
	docker-compose exec app composer dump-autoload

.PHONY: argon-update
argon-update:
	compose exec app composer require laravel-frontend-presets/argon
	compose exec app php artisan preset argon:update
	compose exec app composer dump-autoload

.PHONY: clear-cache
clear-cache:
	composer dump-autoload
	php artisan cache:clear
	php artisan config:clear
	php artisan route:clear
	php artisan view:clear

.PHONY: docker-clear-cache
docker-clear-cache:
	docker-compose exec app php composer dump-autoload
	docker-compose exec app php artisan cache:clear
	docker-compose exec app php artisan config:clear
	docker-compose exec app php artisan route:clear
	docker-compose exec app php artisan view:clear

.PHONY: lint
lint:
	./vendor/bin/php-cs-fixer fix -vvv --config .php_cs.dist
	yarn lint:js

.PHONY: docker-lint
docker-lint:
	docker-compose exec app ./vendor/bin/php-cs-fixer fix -vvv --config .php_cs.dist
	yarn lint:js

.PHONY: php-cs-fixer
php-cs-fixer:
	./vendor/bin/php-cs-fixer fix -vvv --config .php_cs.dist

.PHONY: docker-php-cs-fixer
docker-php-cs-fixer:
	docker-compose exec app ./vendor/bin/php-cs-fixer fix -vvv --config .php_cs.dist

.PHONY: generate-erd
generate-erd:
	docker run -v "$(PWD)/schema:/output" --net="host" schemaspy/schemaspy:snapshot \
	-t pgsql -host $(DB_HOST):$(DB_PORT) -db $(DB_DATABASE) -u $(DB_USERNAME) -p $(DB_PASSWORD) && open ./schema/index.html
