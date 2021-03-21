<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function clear()
    {
        \Cart::clear();
        return \Ajax::redirect(route('cart'));
    }

    public function deleteItem($id)
    {
        \Cart::remove($id);
        return \Ajax::redirect(route('cart'));
    }

    public function addItem($id)
    {
        $product = Product::find($id);
        \Cart::add(array(
            'id' => $product->id, // inique row ID
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array()));
        return \Ajax::redirect(route('cart'));
    }

    public function subItem($id)
    {
        $product = Product::find($id);
        \Cart::update(
            $product->id, array(
            'quantity' => -1, // so if the current product has a quantity of 4, it will subtract 1 and will result to 3
        ));
        return \Ajax::redirect(route('cart'));
    }
}
