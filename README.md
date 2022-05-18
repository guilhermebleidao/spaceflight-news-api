# spaceflight-news-api

A Restful API based on [Space Flight News](https://api.spaceflightnewsapi.net/v3/documentation), a public project with space flights data.

This project is a case from the Code N' App intern program.

## Must have

### Routes
- [x] - [GET] / : Return "Space Flight News"
- [ ] - [GET] /articles/ : List all articles from the database (must use pagination)
- [x] - [GET] /articles/{id} : Get info about one article
- [ ] - [POST] /articles /: Add a new article
- [ ] - [PUT] /articles/{id} : Update an article based on id
- [ ] - [DELETE] /articles/{id} : Delete an article based on id
- [ ] - [GET] /blogs/ : List all blog posts from the database (must use pagination)
- [x] - [GET] /blogs/{id} : Get info about one blog post
- [ ] - [POST] /blogs/ : Add a new blog post
- [ ] - [PUT] /blogs/{id} : Update a blog post based on id
- [ ] - [DELETE] /blogs/{id} : Delete an blog post based on id

### Features
- [ ] - Create a script to feed the database with all articles and blog posts from Space Flight News
- [ ] - Create a CRON to run daily at 9am updating the database with new articles and blog posts from Space Flight News
- [ ] - Create a alert to send an email if there is any failure during the synchronization
- [ ] - Document the API using [L5-Swagger](https://github.com/DarkaOnLine/L5-Swagger)
- [ ] - Create unit tests for the API endpoints

## Nice to have

- [ ] - Login and control acess system

## Installing the dependencies

Open the terminal at the same directory that contains the file `package.json`, and execute:

```bash
composer install
```

## Executing the project

Open the terminal at the same directory that contains the file `package.json`, and execute:

```bash
php artisan serve
```

## Documentation

After executing the project you can acess the documentation at [/api/docs](http://127.0.0.1:8000/api/docs)
