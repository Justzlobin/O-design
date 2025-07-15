.PHONY: dev build up

build:
	./vendor/bin/sail npm run build

dev:
	./vendor/bin/sail npm run dev

up:
	./vendor/bin/sail up -d

cache clear:
	./vendor/bin/sail artisan cache:clear

route clear:
	./vendor/bin/sail artisan route:clear

view clear:
	./vendor/bin/sail artisan view:clear

config clear:
	./vendor/bin/sail artisan config:clear
