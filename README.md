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

3. Execução
   Para executar a aplicação, você pode utilizar o servidor web embutido do Laravel:

```bash
php artisan serve
```

## Testes

Para executar os testes unitários (PHPUnit) na aplicação:

1. você precisará instalar o PHPUnit, caso ainda não tenha feito isso:
```bash
composer require --dev phpunit/phpunit
```
2. Copie o arquivo "phpunit.xml.dist" e retire a extenção ".dist"
```bash
cp phpunit.xml.dist phpunit.xml
```
3. e adicione no arquivo "phpunit.xml" dentro do nó <PHP>
```bash
<env name="KERNEL_CLASS" value="App\Kernel" />
```
3. basta executar o seguinte comando no terminal:
```bash
./vendor/bin/phpunit
```
Obs. Certifique-se de estar no diretório raiz do seu projeto ao executar este comando.


## Autor

* **César Martins** - *GitHub* - [cesarmartins](https://github.com/cesarmartins)
