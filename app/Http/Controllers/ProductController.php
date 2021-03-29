<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return View('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        Product::create($request->all());
        return Redirect('product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return View('product.show')
            ->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        // show the edit form and pass the shark
//       dd($product, $categories);
        return View('product.create')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request,  Product $product)
    {
        $product->update($request->only(['name', 'price', 'description', 'picture', 'picture']));
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return \Ajax::redirect(route('product.index'));
    }

    public function getCatalog(){
        $products = Product::get();
        return View('catalog', compact('products'));
    }

    public function showCart(){
        $data = \Cart::getContent();
        if (Auth::user() != null){
            $id = Auth::user()->id;
            $adresses = DB::select('select * from public.adresses where user_id = ?', [$id]);
            $countOrders = DB::table('orders')
                ->select(DB::raw('sum(amount)'))
                ->where('orders.user_id','=', Auth::user()->id)
                ->groupBy('orders.user_id')
                ->get();

            if (sizeof($countOrders) != 0){
                return View('cart.index', compact('data', 'adresses'), [ 'countOrders' => $countOrders]);
            }
            return View('cart.index', compact('data', 'adresses'));
        }
        else{
            return View('cart.index', compact('data'));
        }
    }
}
