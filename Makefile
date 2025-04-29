.PHONY: dev build up

build:
	./vendor/bin/sail npm run build

dev:
	./vendor/bin/sail npm run dev

up:
	./vendor/bin/sail up -d
