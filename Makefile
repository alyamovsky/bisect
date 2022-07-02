composer-install:
	docker run --rm --interactive --tty --volume ${PWD}:/app php7.1-cli composer update

test:
	docker run --rm --interactive --tty --volume ${PWD}:/app composer test