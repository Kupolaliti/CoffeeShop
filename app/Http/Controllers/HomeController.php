<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = DB::table('orders')
            ->select(DB::raw('orders.id, orders.user_id, orders.amount, orders.created_at'))
            ->leftJoin('users', 'orders.user_id', '=', 'users.id')
//            ->leftJoin('product_orders', 'orders.id', '=', 'product_orders.order_id')
//            ->leftJoin('products', 'product_orders.product_id', '=', 'products.id')
            ->where('orders.user_id','=', Auth::user()->id)
            ->orderBy('orders.created_at', 'asc')
            ->get();

        $adresses = DB::table('adresses')
            ->select(DB::raw('*'))
            ->where('adresses.user_id','=', Auth::user()->id)
            ->get();

        $products = DB::table('product_orders')
            ->select(DB::raw('product_orders.order_id, product_orders.product_id, product_orders.quantity, products.name, products.price, product_orders.price as sellPrice'))
            ->leftJoin('products','product_orders.product_id','=','products.id')
            ->get();

        return View('home', compact('data', 'products', 'adresses'));
    }
}
