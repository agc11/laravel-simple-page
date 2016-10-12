<?php

namespace App\Http\Controllers;

use App\Ingredient;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('ll');
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
        return view('ingredients.create', compact('ingredient'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name'        => 'required|unique:ingredients|max:255',
                'price'       => 'required',
            ],
            [
                'name.required'        => 'El nombre del ingrediente es requerido',
                'name.unique'          => 'El ingrediente ya existe',
                'price.required'       => 'El precio del ingrediente es requerido',
            ]
        );

        Ingredient::create($request->input());
        return redirect('ingredients')->with('message', 'Ingrediente creado');
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
        $ingredient = Ingredient::findOrFail($id);
        return view('ingredients.edit', compact('ingredient'));
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
        $this->validate(
            $request,
            [
                'name'        => "required | max:255 | unique:ingredients,name,{$id}",
                'price'       => 'required',
            ],
            [
                'name.required'        => 'El nombre del ingrediente es requerido',
                'name.unique'          => 'El ingrediente ya existe',
                'price.required'       => 'El precio del ingrediente es requerido',
            ]
        );

        $ingredient = Ingredient::find($id);
        $ingredient->fill($request->all())->save();
        return redirect('ingredients')->with('message', 'Ingrediente actualizado');
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
        return redirect('ingredients')->with('message', 'Ingrediente borrado');
    }
}
