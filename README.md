[![Build Status](https://travis-ci.org/JoseCage/doesangue.me.svg)](https://travis-ci.org/JoseCage/doesangue.me)
[![Test Coverage](https://codeclimate.com/github/JoseCage/doesangue.me/badges/coverage.svg)](https://codeclimate.com/github/JoseCage/doesangue.me/coverage)
 [![Issue Count](https://codeclimate.com/github/JoseCage/doesangue.me/badges/issue_count.svg)](https://codeclimate.com/github/JoseCage/doesangue.me)

# doesangue.me
Plataforma online de procura de doadores e necessitados de sangue.

## O QUE É?
Um <b>webApp</b> (plaforma de website aplicativo) que permite aos usuários procurar e se conectar com pessoas que estejam a necessitar de doação de Sangue ou por outro lado encontrar alguém que esteja disposto a doar seu sangue e salvar vidas.

## COMO PARTICIPAR?
Para usar/participar, basta que cadastre na Plataforma como doador ou instituição responsavél pelo\s usuário\s necessitado\s.

## Doadores!
 O usuário cadastrado como doador deverá informar o seu tipo de sangue, idade, nacionalidade, localização\morada de modo a facilitar que as instituições achem o perfíl certo para o doador que precisam e assim entrar em contacto pessoalmente ou conectar-lo na plataforma.


## instituições!
O usuário cadastrado como Instituição fornecerá os dados como Nome da Instituição, email, NIF (número de Identificação Fiscal), localização da Instituição em questão, contactos de telefone, possibilitando que os usuários (doadores) possam a conectar/contactar na rede ou mesmo pessoalmente.

## QUEM PODE USAR?
Todo cidadão que sinta no dever de salvar vidas doando parte de seu sangue voluntariamente para instituições de saúde ou para pessoas especifícas.


## Desenvolvimento

### assets

```shell
yarn # instalar dependencias node/js/css
```
ou
```shell
npm install # instalar dependencias node/js/css
```

### Docker

- Docker 1.12+
- docker-compose 1.8+

```shell
docker-compose run app composer install # instalar dependencias php
```

```shell
docker-compose run app php artisan key:generate # gerar chave de aplicação
```

```shell
docker-compose run app php artisan migrate --seed # rodar migrações
```

##### Comandos artisan
Usando o comando `docker-compose run app php artisan` se tem acesso ao artisan dentro do container docker

Ex:

```shell
docker-compose run app php artisan # lista de comandos
docker-compose run app php artisan route:list # lista de rotas
```

#### Serviço
> Por padrão a API roda em `localhost:80`

```shell
docker-compose up # subir serviço
```

Para subir o serviço em segundo plano:

```shell
docker-compose up -d # sobe o serviço em segundo plano no terminal
docker-compose down # mata o serviço
```
>>>>>>> master
