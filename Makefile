.DEFAULT_GOAL : help

.PHONY: help
help: ## Помощь
	@printf "\033[33m%s:\033[0m\n" 'Available commands'
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z0-9_-]+:.*?## / {printf "  \033[32m%-18s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

.PHONY: ci-configure
ci-configure: ## Подготовить окружение для пайплайна
	apt-get update && apt-get install -qy git zip curl libmcrypt-dev default-mysql-client libxml2-dev default-jre wget maven redis-server libicu-dev
	docker-php-ext-configure intl
	docker-php-ext-install pdo_mysql bcmath intl
	curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
	composer install
	ln -f -s .env.example .env \
    && php artisan key:generate

.PHONY: ci-phpunit
ci-phpunit: ## Проверка phpunit
	php vendor/bin/phpunit --no-coverage --dont-report-useless-tests --colors=never --do-not-cache-result

.PHONY: ci-cs
ci-cs: ## Проверка cs-fixer
	php ./vendor/bin/php-cs-fixer check

.PHONY: format
format: ## Отформатировать проект
	php ./vendor/bin/php-cs-fixer fix