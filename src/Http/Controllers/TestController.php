<?php

namespace Stephendevs\Lad\Http\Controllers;

use Stephendevs\Lad\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Stephendevs\Lad\SendsContactUsMail;


class TestController extends Controller
{
    use SendsContactUsMail;

}
