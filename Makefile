.PHONY: help install warmup lint cs stan test fix clean

## -------- Основные команды --------

help: ## Показать список команд
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-15s\033[0m %s\n", $$1, $$2}'

install: ## Установить зависимости
	composer install

warmup: ## Прогреть кэш Symfony (нужно для PHPStan)
	php bin/console cache:warmup

## -------- Линтеры --------

lint: ## Все линтеры Symfony
	composer lint:all

## -------- Code Style --------

cs: ## Проверка стиля (без исправлений)
	composer test:cs

fix: ## Исправить стиль кода
	composer fix:cs

## -------- Анализ --------

stan: ## PHPStan анализ
	composer test:phpstan

## -------- Полная проверка --------

test: warmup ## Полная проверка проекта
	composer check:all

## -------- Очистка --------

clean: ## Очистить кэш
	rm -rf var/cache/*
