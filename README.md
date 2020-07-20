# Otaku Index
This is a upcoming Anime site where you can create your own watchlist and make your own "page" with personal anime content etc. 

Our goal is to provide a good looking and easy to understand website with an functional API, which you can also freely use for your own projects! 

Our API is something i would spend most time developing it. Applications like chrome addons which syncronize your list, based on what you watched on specific websites and more should be possible. 

---- 

  <div align="center">
    <img width=214 height=214 src=".github/MEDIA/logo.png">
    <br>

  ![commit-info][commit-info]
  ![contributors-info][contributors-info]
  ![reposize-info][reposize-info]
  
  </div>

----

## Requirements:

- [Docker](https://docs.docker.com/get-docker/)
- [Docker Compose](https://docs.docker.com/compose/install/)

## Quicksetup:

```bash
git clone https://github.com/lazybytez/otaku-index.git && cd otaku-index && mv app/.env.example app/.env && docker-compose up -d --build && docker-compose -u www-data exec php composer install
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
mv app/.env.example app/.env
```

4. Start and build the docker container:
```bash
docker-compose up -d --build
```

5. First time setting up the project:
```bash
docker-compose exec -u www-data php composer install
```

6. Then you can open symfony at [localhost:8888](http://localhost:8888)

If you want to run symfony commands please do so in the php docker container:
```bash
docker-compose exec -u www-data php <command>
```

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
