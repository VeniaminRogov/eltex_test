DOCKER_COMPOSE = docker-compose

DOCKER_COMPOSE_FILE = -f docker-compose.yml
DOCKER_COMPOSE_FILE += -f docker-compose.development.yml
DOCKER_COMPOSE_FILE += -f docker-compose.override.yml

# Default dotenv file
DOCKER_COMPOSE_DOTENV = --env-file ./.env

ifneq ("$(wildcard .env.local)", "")
	DOCKER_COMPOSE_DOTENV = --env-file ./.env.local
endif

DOCKER_COMPOSE += $(DOCKER_COMPOSE_DOTENV)

init:
	@cp -n .env .env.local || echo "File .env.local already exists."

build:
	@$(DOCKER_COMPOSE) build --pull --no-cache

up:
	@$(DOCKER_COMPOSE) up

down:
	@$(DOCKER_COMPOSE) down --remove-orphans

start:
	@$(DOCKER_COMPOSE) up --build --detach

restart: down start

logs:
	@$(DOCKER_COMPOSE) logs --tail=all --follow

sh:
	@$(DOCKER_COMPOSE) exec php-fpm sh

node-sh:
	@$(DOCKER_COMPOSE) exec node sh
