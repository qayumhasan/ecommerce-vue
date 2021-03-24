<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendCartManageController extends Controller
{

      public function checkoutpage()
      {
        return view('frontend.shipping.checkout');
      }
}
