[![Build Status master](https://travis-ci.org/doesangueorg/doesangueweb.svg?branch=master)](https://travis-ci.org/doesangueorg/doesangueweb)
[![Build Status development](https://travis-ci.org/doesangueorg/doesangueweb.svg?branch=development)](https://travis-ci.org/doesangueorg/doesangueweb)
 [![Issue Count](https://codeclimate.com/github/JoseCage/doesangue.me/badges/issue_count.svg)](https://codeclimate.com/github/JoseCage/doesangue.me)

#### Topics.
* [What](#what)?
* [Why](#why)?
* [Development](#development)

![Mente Digital HQ](public/img/logo.jpg)
*Core maintained by Mente Digital Inc and opensource contributors.*

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
docker-compose run app php artisan key:generate # generate the API_KEY
```

```shell
docker-compose run app php artisan migrate --seed # run the migrations
```

##### Artisan commands
Using the command `docker-compose run app php artisan` you can see all available artisan commands

Ex:

```shell
docker-compose run app php artisan # list the commands
docker-compose run app php artisan route:list # list all routes of our API
```

#### Service
> By default the API run's in `localhost:8080`

```shell
docker-compose up # run's the service
```

To run the service in background:

```shell
docker-compose up -d # run's the service in background
docker-compose down # stop and kill the service
```

-----------------
If you prefer to read the portuguese version please check [README PT](README_PT.md) 
