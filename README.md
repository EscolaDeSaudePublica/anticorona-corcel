# iSUS API

Projeto destinado a implementar as regras de negócio que envolvem o aplicativo
do iSUS, vai desde a autenticação com o projeto ID Saúde a sincronização de dados
com o Wordpress

# Dependências
- Docker
- PHP 7.4 (FPM)
- Laravel 7

# Instalação

## Servidor de desenvolvimento 🚀🚀

### 1. Clone o projeto na branch develop

```
$ git clone https://github.com/EscolaDeSaudePublica/isus-api.git -b develop
```

### 2. Inicialize a infra com o docker

```sh
# Acesse a pasta
$ cd isus-api

# Inicialize os containeres
$ docker-compose up
```

Serão criados 3 containeres:

- **api-isus-web**: nginx
- **api-isus-fpm**: php-fpm onde o código é executado
- **api-isus-db**: Mysql database

### 3. Configurações da API

Faça uma cópia do arquivo .env.example para `.env`.

Altere as configurações no arquivo `.env` de acordo com a necessidade do projeto, como configurações de banco de dados para o isus e o banco de dados do wordpress.

### 4. Instalando dependências

Execute o comando abaixo para instalar as dependencias e executar as *migrations* e os *seeds*

```sh
$ docker exec -it api-isus-fpm composer install && php artisan key:generate && php artisan migrate --seed
```

Libere permissão para as views acessarem os storage

```
sudo chgrp -R www-data storage bootstrap/cache
sudo chmod -R ug+rwx storage bootstrap/cache`
```

> Para realizar os testes automatizados será preciso criar o banco de teste e executar a migration para banco de teste

### 4.1. Configurando para testes automatizados

1. Copie o arquivo `.env` para `.env.testing`
2. Altere o banco de dados na variável `DB_DATABASE` para `isus_testing`
3. Execute a migraçãoe configuração do banco de teste

```
$ docker exec -it api-isus-db mysql -uroot -p12345678 -e "create database isus_testing"
$ docker exec -it api-isus-fpm php artisan migrate --seed --database=mysql_testing
```

### 4.2. Teste 

1. Acesse [http://localhost:7000/](http://localhost:7000/) se tudo ocorrer bem irá ter API-ISUS.
2. Execute os testes automatizados

```
$ docker exec -it api-isus-fpm php artisan test
```
