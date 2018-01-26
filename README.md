# This project is now archieved.
Read about it [here](https://medium.com/@JoseCage/chegou-a-hora-do-adeus-doesangue-e-um-recomeço-para-mim-faf11ab27163)

[![Packagist](https://img.shields.io/packagist/v/doesangueorg/core.svg)](https://packagist.org/packages/doesangueorg/core)
[![All Contributors](https://img.shields.io/badge/all_contributors-3-orange.svg?style=flat-square)](#contributors)
[![Build Status](https://travis-ci.org/doesangueorg/doesangue-core.svg?branch=master)](https://travis-ci.org/doesangueorg/doesangue-core)
[![codecov](https://codecov.io/gh/doesangueorg/doesangue-core/branch/master/graph/badge.svg)](https://codecov.io/gh/doesangueorg/doesangue-core)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/doesangueorg/doesangue-core/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/doesangueorg/doesangue-core/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/doesangueorg/doesangue-core/badges/build.png?b=master)](https://scrutinizer-ci.com/g/doesangueorg/doesangue-core/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/doesangueorg/doesangue-core/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/doesangueorg/doesangue-core/?branch=master)


#### Topics.
* [What](#what)?
* [Why](#why)?
* [Instalation](#instalation)
* [Development](#development)
* [Contributing](#contributing)
* [Contributors](#contributors)

## What?
[doesangue.me](https://doesangue.me) is a free (and opensource and free) platform that connects people interesting in blood donation.

## Why?


# Instalation

If you want to install locally or deploy to your server/infra please follow the guide at our [Wiki](https://github.com/doesangueorg/doesangue-core/wiki)

## Development

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


### Contributing
To contribute to this repo, please check the documentation/guide at [Contributing](CONTRIBUTING.md)

### Contributors
We consider and respect everybody that contribute to our project.
Check the complete list of contributors in [CONTRIBUTORS](CONTRIBUTORS.md) doc.
