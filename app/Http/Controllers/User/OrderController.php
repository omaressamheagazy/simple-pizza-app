<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Pizza;
use Doctrine\DBAL\Schema\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class OrderController extends Controller
{
    public function index()
    {
        $pizzas = Pizza::all();
        return view('order', ['pizzas' => $pizzas]);
    }

    public function addToCart(Request $request)
    {
        $pizzaID = $request->input('pizza_id');
        $isPizzaExist = Pizza::where('id', $pizzaID)->exists();
        if ($isPizzaExist) {
            $cartItem = Cart::create([
                'pizza_id' => $pizzaID,
                'user_id' => getCurrentUserId(),
            ]);
            return response()->json(['status' => "Added to cart", 'cart-counter' => $cartItem->count()]);
        }
    }

    public function viewOrderSummary($id)
    {
        $cartDetails = Cart::with('pizza')->where('user_id', $id)->get();
        $cartDetails = count($cartDetails) ? $cartDetails : [];
        $totalPrice = $cartDetails->sum(function ($item) {
            return $item->pizza->price;
        });
        return view('order-summary', ['cartDetails' => $cartDetails, 'totalPrice' => $totalPrice]);
    }

    public function checkout(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $cartItems = Cart::with('pizza')->where('user_id', $request->user_id)->get();
        $totalPrice = 0;
        $lineItems = [];
        foreach ($cartItems as $cartItem) {
            $totalPrice += $cartItem->pizza->price;
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $cartItem->pizza->name,
                    ],
                    'unit_amount' => $cartItem->pizza->price * 100,
                ],
                'quantity' => 1,
            ];
        }
        $session = \Stripe\Checkout\Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success', [], true) . "?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('checkout.cancel', [], true),
        ]);

        $order = new Order();
        $order->status = "unpaid";
        $order->total_price = $totalPrice;
        $order->user_id = $request->user_id;
        $order->session_id = $session->id;
        $order->save();

        return redirect($session->url);
    }

    public function success(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $sessionId = $request->get('session_id');
        $session = \Stripe\Checkout\Session::retrieve($sessionId);
        try {
            if (!$session) { // validate the session
                throw new NotFoundHttpException;
            }
            $order = Order::where('session_id', $session->id)->first();
            if (!$order) {
                throw new NotFoundHttpException();
            }
            if ($order->status === 'unpaid') {
                $order->status = 'paid';
                $order->save();
            }
            return view('order-success');
        } catch (\Throwable $th) {
            throw new NotFoundHttpException;
        }

    }

    public function fail()
    {
    }
}
