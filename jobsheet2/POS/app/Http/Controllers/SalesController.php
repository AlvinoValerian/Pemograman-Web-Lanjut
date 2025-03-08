<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function __invoke()
    {
        return view('sales.index');
    }
}
