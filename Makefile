.DEFAULT_GOAL := help

build: ## build develoment environment
	docker compose build

up: ## Run wordpress container
	docker compose up & npm start &

down: ## stop container
	docker compose down

bash: ## Run bash at wordpress container
	docker compose exec wordpress bash

db-bash: ## Run bash at wordpress container
	docker compose exec mariadb bash

.PHONY: help
help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'
