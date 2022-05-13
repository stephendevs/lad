[![](https://raw.githubusercontent.com/stephendevs/stephendevs/main/lad/lad.png)](ttps://www.linkedin.com/in/stephendev)

---

### Installation 👋

1. Require the package using composer.

```php
composer require stephendevs/lad
```

2. Add `Stephendevs\Lad\Providers\LadServiceProvider` to your `\config\app.php` providers array.

```php
'providers' => [
    /*
     * Package Service Providers...
     */
    Stephendevs\Lad\Providers\LadServiceProvider::class,
],
```
3. Publish assets, & config file

```php
php artisan vendor:publish --tag=lad-assets
php artisan vendor:publish --tag=lad-config
```


---

### Authentication Guard 👋
---
### Configuration

1. ###### Database Configuration
```php
php artisan set:env DB_CONNECTION mysql --config=database.default
php artisan set:env DB_HOST 127.0.0.1 --config=database.connection.mysql.host
php artisan set:env DB_PORT 8080 --config=database.connection.mysql.port
php artisan set:env DB_USERNAME root --config=database.connection.mysql.username
php artisan set:env DB_PASSWORD hellopwd --config=database.connection.mysql.password
```
2. ###### Mail Configuration
```php
php artisan set:env MAIL_DRIVER your_mail_driver --config=mail.driver
php artisan set:env MAIL_HOST your_mail_host --config=mail.host
php artisan set:env MAIL_PORT your_mail_driver_port --config=mail.port
php artisan set:env MAIL_USERNAME your_mail_driver_username --config=mail.username
php artisan set:env MAIL_PASSWORD your_mail_driver_password --config=mail.password
php artisan set:env MAIL_ENCRYPTION your_mail_driver_encryption --config=mail.encryption
```
3. ###### You will need to set email addresss and name for sending emails in your application otherwise `hello@example.com` $ `Example` will be used as address and name.
```php
php artisan set:env MAIL_FROM_ADDRESS mail_from_address --config=mail.from.address
php artisan set:env MAIL_FROM_NAME mail_from_name --config=mail.from.name
```

---

```php
https://yourdomain.com/dashboard
```
