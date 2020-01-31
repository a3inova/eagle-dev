<?php

namespace App\Http\Controllers\ags;

use App\Models\ags\AgsTipoLogradouro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgsTipoLogradouroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AgsTipoLogradouro::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return AgsTipoLogradouro::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return AgsTipoLogradouro::findOrFail($id);
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
        AgsTipoLogradouro::findOrFail($id)->update($request->all());
        return AgsTipoLogradouro::findOrFail($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AgsTipoLogradouro::findOrFail($id)->delete();
        return '0';
    }
}
