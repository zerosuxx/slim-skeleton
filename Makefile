run_docker=docker-compose run --rm app

default: help

help: ## Show this help
	@fgrep -h "##" $(MAKEFILE_LIST) | fgrep -v fgrep | sed -e 's/\\$$//' -e 's/:.*#/: #/'

serve: ## Run local php server
	php -S localhost:8080 public/index.php

build: ## Build the docker image
	docker-compose build --no-cache

install: ## Install the project dependencies with composer
	make build
	$(run_docker) composer install --no-interaction

update: ## Update the project dependencies with composer
	$(run_docker) composer update --no-interaction

du: ## Regenerate composer autoloader
	$(run_docker) composer dump-autoload

up: ## Starts docker-compose
	docker-compose up --build

upd: ## Starts docker-compose in daemon mode
	docker-compose up -d --build

stop: ## Stops docker-compose
	docker-compose stop

down: ## Destroys service containers
	docker-compose down

sh: ## Starts a bash shell in service container
	$(run_docker) sh

ssh: ## Connect a bash shell in service container
	docker-compose exec app sh

logs: ## Shows logs of service
	docker-compose logs app

logst: ## Tails logs of service
	docker-compose logs -f app

check-style: ## Fix code style with php codesniffer
	$(run_docker) composer check-style

fix-style: ## Check code style with php codesniffer
	$(run_docker) composer fix-style

analyze: ## Analyze code
	$(run_docker) composer analyze

cat: ## Check code style & Analyze & Test
	$(run_docker) composer cat

test: ## Run tests
	$(run_docker) composer test
