.PHONY: all
all: install dump-autoload tests

.PHONY: install
install:
	composer install

.PHONY: dump-autoload
dump-autoload:
	composer dump-autoload

.PHONY: tests
tests:
	composer test