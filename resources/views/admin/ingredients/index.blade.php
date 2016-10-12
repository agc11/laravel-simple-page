@extends('layouts.app')

@section('title', 'Ingredientes')

@section('content')
    <div class="container">

        @include('partials.nav-ingredients')

        <hr />

        @include('partials.flash')

        @forelse($ingredients as $ingredient)
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $ingredient->name }}
                </div>
                <div class="panel-body">
                    <p>Precio: {{ $ingredient->price }}</p>
                </div>

                <div class="panel-footer" style="height: 45px;">

                    {{
                        link_to_action(
                            'IngredientController@edit', 'Editar', ['id' => $ingredient->id], ['class' => 'col-md-2']
                        )
                    }}

                    <span class="pull-right">
                        {!! Form::open(['method' => 'DELETE', 'route' => ['ingredients.destroy', $ingredient->id] ]) !!}
                        {!! Form::submit('Borrar', ["class" => "btn btn btn-xs btn-danger"]) !!}
                        {!! Form::close() !!}
                    </span>

                </div>
            </div>
        @empty
            <div class="alert alert-danger">
                No hay Ingredientes
            </div>
        @endforelse

        @if(    $ingredients)
            {{ $ingredients->links() }}
        @endif
    </div>
@endsection