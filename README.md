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

# Quicknav
[Types](https://github.com/milanobrtlik/sf-gql/tree/main/config/graphql/types)  
[Custom config](https://github.com/milanobrtlik/sf-gql/blob/main/config/packages/graphql.yaml)  
[Dataloaders & Resolvers](https://github.com/milanobrtlik/sf-gql/tree/main/src/GraphQL)
