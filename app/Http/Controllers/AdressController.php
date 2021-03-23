<?php

namespace App\Http\Controllers;

use App\Models\Adress;
use Illuminate\Http\Request;

class AdressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adresses = Adress::get();
        return View('adress.index', compact('adresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('adress.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Adress::create($request->all());
        return Redirect('adress');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $adress = Adress::find($id);

        return View('adress.show')
            ->with('adress', $adress);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adress = Adress::find($id);
        // show the edit form and pass the shark
//       dd($product, $categories);
        return View('adress.create')->with('adress', $adress);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adress $adress)
    {
        $adress->update($request->only(['state', 'city', 'postCode', 'adressLine', 'user_id']));
        return redirect()->route('adress.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adress $adress)
    {
        $adress->delete();
        return \Ajax::redirect(route('adress.index'));
    }
}
