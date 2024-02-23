d-up:
	docker-compose up -d

d-down:
	docker-compose down

d-build:
	docker-compose up --build -d

test:
	docker exec app-php-cli-1 vendor/bin/phpunit --colors=always

run dev:
	docker exec app-node-1 npm run dev

memory:
	sysctl -w vm.max_map_count=262144
