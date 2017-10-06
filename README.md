kata_doctrine
=============

## Instructions

1) Clone project
2) Run ``docker-compose up -d``
3) Run ``composer install``
4) Add doctrine annotations on all **Entities**, according to the below schema

![schema database](app/Resources/doc/schema_database.png)

## Run

```bash
$ php bin/console doctrine:schema:create
$ php bin/console doctrine:fixtures:load
```

Try PHPMyAdmin => [http://127.0.0.1:8085](http://127.0.0.1:8085)


## Links

- https://symfony.com/doc/current/doctrine.html#add-mapping-information
- https://symfony.com/doc/current/doctrine/associations.html
- http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/reference/association-mapping.html
