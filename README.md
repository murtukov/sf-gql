# sf-gql
An example of solving N+1 problem with Symfony, Doctrine and Overblog packages.

# Install
Setup ports in `docker-compose.yml`, then run docker up
```sh
$ docker-compose up
```
Install dependencies
```sh
$ docker-compose exec php-fpm composer install
```
Init db
```sh
$ docker-compose exec php-fpm bin/console d:s:u -f
```
Visit route `/graphiql`.
