# allabout-laravel-docker

## Create laravel file
$ composer create-project --prefer-dist laravel/laravel laravel-app "^6.2"  

## Build container
docker-compose up -d  

## Enter in the container
docker-compose exec app bash  

## Path
chmod -R 777 bootstrap/cache/  
chmod -R 777 storage/  