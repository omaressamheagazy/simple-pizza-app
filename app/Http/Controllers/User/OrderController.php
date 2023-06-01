<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Pizza;
use Doctrine\DBAL\Schema\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index() {
        $pizzas = Pizza::all();
        return view('order', ['pizzas' => $pizzas]);
    }

    public function addToCart(Request $request) {
        $pizzaID = $request->input('pizza_id');
        $isPizzaExist = Pizza::where('id', $pizzaID)->exists();
        if ($isPizzaExist) { 
            $cartItem = new Cart();
            $cartItem->pizza_id = $pizzaID;
            $cartItem->user_id = Auth::user()->id;
            $cartItem->save();
            return response()->json(['status' => "Added to cart", 'cart-counter' => $cartItem->count()]);
        }
    }
}

