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

**Aplikacja powinna być dostępna na:**

```
localhost:8080
```

**A baza danych:**
```
HOST=127.0.0.1
PORT=33061
DATABASE=pizza-orders
USERNAME=root
PASSWORD=secret
```



