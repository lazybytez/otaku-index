# Otaku Index

Our goal is to provide easy to understand Anime website with an functional REST API, which you can also freely use for your own projects!

---- 

  <div align="center">
    <img width=214 height=214 src=".github/MEDIA/logo.png">
    <br><br>

  ![commit-info][commit-info]
  ![contributors-info][contributors-info]
  ![reposize-info][reposize-info]
  
  </div>

----

If you want to work with the API you can find the official Documentation here: [otakuindex.docs.apiary.com](https://otakuindex.docs.apiary.io)

If you want to take part in our developement you can find the setup below:

## Requirements:

- [Docker](https://docs.docker.com/get-docker/)
- [Docker Compose](https://docs.docker.com/compose/install/)

## Quicksetup:

```bash
git clone https://github.com/lazybytez/otaku-index.git && cd otaku-index && cp app/.env.example app/.env && docker-compose up -d --build && docker-compose exec -u www-data php composer install
```

## Getting started:

1. Clone the repository:
```bash
git clone https://github.com/lazybytez/otaku-index.git
```

2. Go into the folder of the project:
```bash
cd otaku-index
```

3. Change the .env.example to .env
```bash
cp app/.env.example app/.env
```

4. Start and build the docker container:
```bash
docker-compose up -d --build
```

5. First time setting up the project:
```bash
docker-compose exec -u www-data php composer install && docker-compose exec -u www-data php composer drop-env dev
```

6. Then you can open symfony at [localhost:8888](http://localhost:8888)

## Developer:

1. If you want to run symfony commands please do so in the php docker container:
```bash
docker-compose exec -u www-data php <command>
```

2. If you want to get the Database working you first have to execute a few commands:
```bash
docker-compose exec -u www-data php php bin/console doctrine:database:create
```
```bash
docker-compose exec -u www-data php php bin/console doctrine:migrations:migrate
```
```bash
docker-compose exec -u www-data php php bin/console doctrine:fixtures:load
```

3. If you want to look at the database you can so do with phpmyadmin [localhost:8889](http://localhost:8889)

## Contributing

If you want to take part in contribution, like fixing issues and contributing directly to the code base, plase visit the [How to Contribute][github-contribute] document.

## Useful links:
[License][github-license] - 
[Contributing][github-contribute] - 
[Code of conduct][github-codeofconduct] - 
[Issues][github-issues] - 
[Pull requests][github-pulls] - 
[Security][github-security] 

<hr>  

###### Copyright (c) [Lazy Bytez][github-team]. All rights reserved | Licensed under the MIT license. | 2020 - today

<!-- Variables -->
[github-team]: https://github.com/lazybytez

[github-license]: https://github.com/lazybytez/otaku-index/blob/master/LICENSE
[github-contribute]: https://github.com/lazybytez/otaku-index/blob/master/CONTRIBUTING.md
[github-codeofconduct]: https://github.com/lazybytez/otaku-index/blob/master/CODE_OF_CONDUCT.md
[github-issues]: https://github.com/lazybytez/otaku-index/issues
[github-pulls]: https://github.com/lazybytez/otaku-index/pulls
[github-security]: https://github.com/lazybytez/otaku-index/blob/master/SECURITY.md

[commit-info]: https://img.shields.io/github/last-commit/lazybytez/otaku-index?style=flat-square

[contributors-info]: https://img.shields.io/github/contributors/lazybytez/otaku-index?style=flat-square

[reposize-info]: https://img.shields.io/github/repo-size/lazybytez/otaku-index?style=flat-square
