<?php

namespace Stephendevs\Lad\Http\Controllers\Mailer;

use Stephendevs\Lad\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Stephendevs\Lad\SendsContactUsMail;


class TestContactFormController extends Controller
{
    use SendsContactUsMail;

}
