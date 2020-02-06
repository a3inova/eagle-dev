<?php

namespace App\Http\Controllers\ags;

use App\Models\ags\AgsGrupoFornecedor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgsGrupoFornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AgsGrupoFornecedor::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return AgsGrupoFornecedor::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return AgsGrupoFornecedor::findOrFail($id);
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
        AgsGrupoFornecedor::findOrFail($id)->update($request->all());
        return AgsGrupoFornecedor::findOrFail($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AgsGrupoFornecedor::findOrFail($id)->delete();
        return '0';
    }
}
