@extends('layouts.admin')

@section('title', 'Ingredientes')

@section('content')


        @include('partials.flash')

            {{
                 link_to_action(
                     'Admin\IngredientController@create',
                     'Crear Ingrediente',
                     [],
                     ['class' => 'btn btn-md btn-success pull-right']
                 )
             }}
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Editar</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($ingredients as $ingredient)
                    <tr>
                        <td>{{ $ingredient->id }}</td>
                        <td>{{ $ingredient->name }}</td>
                        <td>{{ $ingredient->price }}</td>
                        <td>
                            {{
                            link_to_action(
                                'Admin\IngredientController@edit', 'Editar Ingrediente', ['id' => $ingredient->id], ['class' => 'btn btn-xs btn-info']
                            )
                            }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No hay ingredientes</td>
                    </tr>
                @endforelse

                </tbody>

            </table>

        @if(    $ingredients)
            {{ $ingredients->links() }}
        @endif

@endsection