dir:
	mkdir app/ && mkdir public && cd public && mkdir css js && touch index.php
init:
	composer init
autoload:composer.json
	composer dumpautoload
auth: ## creer les composantes de l'authentifica
	cd app/Controller && mkdir Auth/ && cd Auth && touch RegisterController.php && touch LoginController.php
run:   ##lance le server interne de php
	php -S localhost:8000 -t public/ -d display_errors=1


