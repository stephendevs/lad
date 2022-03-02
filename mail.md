[![](https://raw.githubusercontent.com/stephendevs/stephendevs/main/icons/lad/bannner.png)](ttps://www.linkedin.com/in/stephendev)

# Lad 👋, 

### Sending Contact Us Email

Lad provides a simple way to implement the sending of emails on your website. after configuring mail drivers as specified in the laravel documentation.

 ---
### Lets Get Started.

###### 1. Contact Form Fields.

```html
<!-- The name of the client sending email -->
<input type="text" name="name" class="form-control" placeholder="Name" />

<!-- The email address of the client -->
<input type="text" name="email" class="form-control" placeholder="Email Address" />

<!-- The subject -->
<input type="text" name="subject" class="form-control" placeholder="Subject" />

<!-- The email message -->
<textarea name="message" id="message" placeholder="Message" class="form-control"></textarea>
```


###### 2. Creating your controller.

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Stephendevs\Lad\SendsContactUsMail;


class ContactController extends Controller
{
    use SendsContactUsMail;

}
```

###### 3. Showing Your Contact Page.

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Stephendevs\Lad\SendsContactUsMail;


class ContactController extends Controller
{
    use SendsContactUsMail;

    /**
      * Show Contact Form Page
     */
    public function index()
    {
        return view('contact-us');
    }

}
```

###### 4. Routes

```php
<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/contact-us', 'ContactusController@index')->name('contactus');
Route::post('/contact-us', 'ContactusController@send');
```