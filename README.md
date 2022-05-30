[![](https://raw.githubusercontent.com/stephendevs/stephendevs/main/lad/lad.png)](ttps://www.linkedin.com/in/stephendev)

---
### Installation 👋
Using composer run `composer require stephendevs/lad`
```php
composer require stephendevs/lad
```
### Publish Assets, Views & Configuration

```php
php artisan lad:install
```
### Database Migration & Default User Creation.
With proper DB Configurations run `php artisan migrate` to the migrate you Database Tables & Create default admin user `php artisan create:admin --default`
```php
php artisan migrate
php artisan create:admin --default
```
### Redirecting Unauthenticated Users
Modify the redirect behaviour to point to `dashboard\login` for unauthenticated users by updating the redirectTo function in your `App\Http\Middleware\Authenticate` file to return `route('lad.login)`
```php
<?php
namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('lad.login');
        }
    }
}
```
Access your login page via `yourdomain.com/dashboard/login`

---
<p align='left'>
<a href="https://twitter.com/stephendevs"><img height="30" src="https://raw.githubusercontent.com/stephendevs/stephendevs/main/icons/social/twitter.png" alt="twitter"></a>&nbsp;&nbsp;
<a href="https://instagram.com/stephendevs"><img height="30" src="https://raw.githubusercontent.com/stephendevs/stephendevs/main/icons/social/instagram.png" alt="instagram"></a>&nbsp;&nbsp;
<a href="https://www.linkedin.com/in/stephdevs/"><img height="30" src="https://raw.githubusercontent.com/stephendevs/stephendevs/main/icons/social/linkedin.png" alt="linkedin"></a>
</p>