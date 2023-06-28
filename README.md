# Claryfi-junior-php
## Steps to install
```
docker-compose up -d
composer install
npm install
docker-compose exec app php artisan migrate:refresh --seed
```

## Run dev
```
npm run dev
```

## Run tests
```
docker-compose exec app php artisan test
```


PS: I know that .env files shouldn`t be in git repo, this was left intentionally 
