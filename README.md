# Otaku Index
This is a new Anime site where you can create your own List and make your own "page" with what you watched and plan to watch etc. 
Our goal is to provide a good looking website with easy to understand featuires and an functional API, which you can also freely use for your own projects! 

---- 

  <div align="center">
    <img width=214 height=214 src=".github/MEDIA/logo.png">
  
  ![commit-info][commit-info]
  ![contributors-info][contributors-info]
  ![reposize-info][reposize-info]
  
  </div>

----

## Requirements:

- [Docker](https://docs.docker.com/get-docker/)
- [Docker Compose](https://docs.docker.com/compose/install/)

## Getting started:

1. Clone the repository:
```
git clone https://github.com/lazybytez/otaku-index.git
```

2. Go into the folder of the project:
```
cd otaku-index
```

3. Start and build the docker container:
```
docker-compose up -d --build
```

4. Run symfony commands in the php docker container:
```
docker-compose exec php <command>
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
