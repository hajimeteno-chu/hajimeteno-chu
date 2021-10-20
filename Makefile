up:
	docker compose up -d
build:
	docker compose build --no-cache --force-rm
laravel-install:
	docker compose exec backend composer create-project --prefer-dist laravel/laravel .
create-project:
	mkdir -p backend
	@make build
	@make up
	@make laravel-install
#	docker compose exec backend php artisan key:generate
	docker compose exec backend php artisan storage:link
	docker compose exec backend chmod -R 777 storage bootstrap/cache
#	@make fresh
install-recommend-packages:
	docker compose exec backend composer require doctrine/dbal
	docker compose exec backend composer require --dev ucan-lab/laravel-dacapo
	docker compose exec backend composer require --dev barryvdh/laravel-ide-helper
	docker compose exec backend composer require --dev beyondcode/laravel-dump-server
	docker compose exec backend composer require --dev barryvdh/laravel-debugbar
	docker compose exec backend composer require --dev roave/security-advisories:dev-master
	docker compose exec backend php artisan vendor:publish --provider="BeyondCode\DumpServer\DumpServerServiceProvider"
	docker compose exec backend php artisan vendor:publish --provider="Barryvdh\Debugbar\ServiceProvider"
init:
	docker compose up -d --build
	docker compose exec backend composer install
	docker compose exec backend cp .env.example .env
#	docker compose exec backend php artisan key:generate
	docker compose exec backend php artisan storage:link
	docker compose exec backend chmod -R 777 storage bootstrap/cache
#	@make fresh
remake:
	@make destroy
	@make init
stop:
	docker compose stop
down:
	docker compose down --remove-orphans
restart:
	@make down
	@make up
destroy:
	docker compose down --rmi all --volumes --remove-orphans
destroy-volumes:
	docker compose down --volumes --remove-orphans
ps:
	docker compose ps
logs:
	docker compose logs
logs-watch:
	docker compose logs --follow
log-backend-ngx:
	docker compose logs backend-ngx
log-backend-ngx-watch:
	docker compose logs --follow backend-ngx
log-backend:
	docker compose logs backend
log-backend-watch:
	docker compose logs --follow backend
#log-db:
#	docker compose logs db
#log-db-watch:
#	docker compose logs --follow db
backend-ngx:
	docker compose exec backend-ngx ash
backend:
	docker compose exec backend bash
#migrate:
#	docker compose exec backend php artisan migrate
#fresh:
#	docker compose exec backend php artisan migrate:fresh --seed
#seed:
#	docker compose exec backend php artisan db:seed
dacapo:
	docker compose exec backend php artisan dacapo
#rollback-test:
#	docker compose exec backend php artisan migrate:fresh
#	docker compose exec backend php artisan migrate:refresh
tinker:
	docker compose exec backend php artisan tinker
test:
	docker compose exec backend php artisan test
optimize:
	docker compose exec backend php artisan optimize
optimize-clear:
	docker compose exec backend php artisan optimize:clear
cache:
	docker compose exec backend composer dump-autoload -o
	@make optimize
	docker compose exec backend php artisan event:cache
	docker compose exec backend php artisan view:cache
cache-clear:
	docker compose exec backend composer clear-cache
	@make optimize-clear
	docker compose exec backend php artisan event:clear
