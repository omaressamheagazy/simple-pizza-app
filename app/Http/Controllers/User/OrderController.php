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
            $cartItem = Cart::create([
                'pizza_id' => $pizzaID,
                'user_id' => Auth::user()->id,
            ]);
            return response()->json(['status' => "Added to cart", 'cart-counter' => $cartItem->count()]);
        }
    }

    public function viewOrderSummary($id ) {
        $cartDetails = Cart::with('pizza')->where('user_id', $id)->get();
        $cartDetails = count($cartDetails) ? $cartDetails : [];
        $totalPrice = $cartDetails->sum(function ($item) {
            return $item->pizza->price;
        });
        return view('order-summary', ['cartDetails' => $cartDetails, 'totalPrice' => $totalPrice]);
    }
}

