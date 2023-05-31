<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Doctrine\DBAL\Schema\View;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $pizzas = Pizza::all();
        return view('order', ['pizzas' => $pizzas]);
    }
}
