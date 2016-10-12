<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Ingredient;



class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredients = Ingredient::paginate(2);
        return view('admin.ingredients.index', compact('ingredients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ingredient = new Ingredient;
        return view('admin.ingredients.create', compact('ingredient'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  $ingredientRequest  $ingredientRequest
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\IngredientRequest $ingredientRequest)
    {
        Ingredient::create($ingredientRequest->input());
        return redirect('administrations/ingredients')->with('message', 'El ingrediente se ha creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ingredient = Ingredient::find($id);
        return view('admin.ingredients.edit', compact('ingredient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Requests\IngredientRequest  $ingredientRequest
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\IngredientRequest $ingredientRequest, $id)
    {

        $ingredient = Ingredient::find($id);
        $ingredient->fill($ingredientRequest->all())->save();
        return redirect('administrations/ingredients')->with('message', 'Ingrediente actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ingredient::destroy($id);
        return redirect('admin/ingredients')->with('message', 'Ingrediente borrado');
    }
}


