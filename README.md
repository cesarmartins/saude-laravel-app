# SaudeTI-app

Este é um projeto pratico de uma aplicação web PHP utilizando o
Laraval 11 para realizar o teste.

## Configuração

1. Clone o repositório:

```bash
git clone https://github.com/cesarmartins/saude-laravel-app.git 
```

2. Instale as dependências via Composer:

```bash
composer install
```

3. Docker
   Para executar a aplicação, você pode utilizar inicializar o docker:

```bash
docker-compose up -d
```

4. Instalando as dependencias
   acesse o contener:

```bash
docker-compose exec app bash
```

5. Instalando as dependencias do PHP

```bash
composer install
```

6. Run database migrations

```bash
php artisan migrate
```

7. Run database seeder

```bash
php artisan db:seed
```


## Testes

Para executar os testes unitários (PHPUnit) na aplicação:

1. você precisará instalar o PHPUnit, caso ainda não tenha feito isso:
```bash
composer require --dev phpunit/phpunit
```

3. basta executar o seguinte comando no terminal:
```bash
./vendor/bin/phpunit
```
Obs. Certifique-se de estar no diretório raiz do seu projeto ao executar este comando.


You're ready to go! Visit in your browser and Postman, and login with:

Username: isaias.feeney@example.net
Password: password


## Autor

* **César Martins** - *GitHub* - [cesarmartins](https://github.com/cesarmartins)
