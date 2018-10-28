### Dokumentacja API
http://api.pizzaorders.pl/api/documentation


### Uruchomienie aplikacji w środowisku deweloperskim

1. **Pobranie projektu z repozytorium i pobranie zależności**

```
 git clone https://github.com/ppsi2-pizza-orders/pizza-orders-api
```

```
cd pizza-orders-api
```

```
composer install
```

2. **Konfiguracja pliku .env**

```
 cp .env.example .env
```

**_W pliku .env należy ustawić odpowiednie dane dostępu do bazy danych itp._**

```
php artisan key:generate
```

3. **Uruchomienie kontenerów dockerowych**

```
cd docker
```

```
docker-compose up -d
```

```
cd ..
```

3. **Migracja tabel w bazie danych i seed początkowych danych**

```
php artisan migrate
```

```
php artisan db:seed
```

4. **Wygenerowanie kluczy potrzebnych do generowania tokenów uwierzytelniania**

```
php artisan passport:install
```

**Drugą wygenerowaną parę należy zapisać w pliku .env**

```
OAUTH_CLIENT_ID=2
OAUTH_CLIENT_SECRET=RalkHuuvqZpGt7B94hLU3DuCSAciib138ZRfz0px
```


**Aplikacja powinna być dostępna na:**

```
localhost:8080
```



