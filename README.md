[![Build Status](https://travis-ci.org/doesangueorg/doesangueweb.svg)](https://travis-ci.org/doesangueorg/doesangueweb)
[![Test Coverage](https://codeclimate.com/github/doesangueorg/doesangueweb/badges/coverage.svg)](https://codeclimate.com/github/doesangueorg/doesangueweb/coverage)
 [![Issue Count](https://codeclimate.com/github/doesangueorg/doesangueweb/badges/issue_count.svg)](https://codeclimate.com/github/doesangueorg/doesangueweb)

#### Topics.
* [What](#what)?
* [Why](#why)?
* [Development](#development)

![Mente Digital HQ](public/img/logo.jpg)

## What?


## Why?


## Development

### assets

```shell
yarn # install node/js/css dependencies
```
or
```shell
npm install # install node/js/css dependencies
```

### Docker

- Docker 1.12+
- docker-compose 1.8+

```shell
docker-compose run app composer install # install php dependencies
```

```shell
docker-compose run app php artisan key:generate # gerar chave de aplicação
```

```shell
docker-compose run app php artisan migrate --seed # rodar migrações
```

##### Artisan commands
Usando o comando `docker-compose run app php artisan` se tem acesso ao artisan dentro do container docker

Ex:

```shell
docker-compose run app php artisan # lista de comandos
docker-compose run app php artisan route:list # lista de rotas
```

#### Service
> Por padrão a API roda em `localhost:8080`

```shell
docker-compose up # subir serviço
```

Para subir o serviço em segundo plano:

```shell
docker-compose up -d # sobe o serviço em segundo plano no terminal
docker-compose down # mata o serviço
```
