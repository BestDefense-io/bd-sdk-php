.PHONY: all
all: install tests

.PHONY: install
install:
	composer install


.PHONY: tests
tests:
	vendor/bin/phpunit