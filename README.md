# Claryfi-junior-php
## Steps to install
```
docker-compose up -d
composer install
npm install
docker-compose exec app php artisan migrate:refresh --seed
npm run dev
```

## Run dev
```
npm run dev
```

## Run tests
```
docker-compose exec app php artisan test
```

