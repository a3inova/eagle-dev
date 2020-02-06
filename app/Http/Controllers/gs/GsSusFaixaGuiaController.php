<?php

namespace App\Http\Controllers\gs;

use App\Models\gs\GsSusFaixaGuia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GsSusFaixaGuiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return GsSusFaixaGuia::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return GsSusFaixaGuia::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return GsSusFaixaGuia::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        GsSusFaixaGuia::findOrFail($id)->update($request->all());
        return GsSusFaixaGuia::findOrFail($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        GsSusFaixaGuia::findOrFail($id)->delete();
        return '0';
    }
}
