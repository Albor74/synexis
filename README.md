
# Symfony Project Setup

Инструкция по развертыванию проекта локально.

## Требования

* PHP 8.4 или выше
* Composer
* Docker & Docker Compose
* Symfony CLI (рекомендуется)

1. Git clone
2. Create временную папку temporal 

3. cd temporal ->  composer create-project symfony/skeleton:"8.0.*".  (точка в конце обязательна)
  - ctrl + a ctrl+x -> cd project ctrl+v

4. .env
 - У вас уже есть .env (создан create-project)
 - Создайте .env.local (или скопируйте из .env)
 - Отредактируйте .env.local под свои локальные нужды ( DATABASE_URL для вашего Docker-контейнера)
    DATABASE_URL="postgresql://name_user:password@127.0.0.1:3306/name_db?serverVersion=8.0"
 - Файл .env оставьте как есть (он для общих настроек)
 
5. composer install  
   -После create-project зависимости уже установлены, но лишний раз запустить install — не ошибка. 
    Он просто проверит, что всё на месте, и не сломает ничего. Как подстраховка — ок.

6. docker-compose up -d  
    - Запускает контейнер с БД (предполагается, что docker-compose.yml есть или вы его создали).
    
7. composer require symfony/orm-pack
8. composer require symfony/maker-bundle --dev
9. php bin/console doctrine:database:create --if-not-exists
    - Создаёт пустую БД, если её ещё нет. Обязательный шаг.

10. php bin/console make:migration
    Даже без ваших сущностей создаст миграцию, которая содержит таблицу doctrine_migration_versions (системная таблица Doctrine для учёта применённых миграций). Это полезно — вы сразу получаете работающий механизм миграций.
    
11. php bin/console doctrine:migrations:migrate
    - Применит эту миграцию, и таблица doctrine_migration_versions появится в БД.
    - 
12. symfony server:start
