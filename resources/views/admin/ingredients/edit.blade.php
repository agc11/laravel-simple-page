@extends('layouts.app')

@section('content')

    <div class="container">

        @include('partials.admin-nav')

        <hr />

        @include('partials.flash')

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {!! Form::model($ingredient, ['route' => ['admin.ingredients.update', $ingredient->id], 'class' => 'form-horizontal', 'method' => 'PUT', 'id' => 'edit-ingredient']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('price', 'Precio') !!}
            {!! Form::text('price', old('name'), ['class' => 'form-control']) !!}
        </div>


        {!! Form::submit('Actualizar ingrediente', ['class' => 'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>

@endsection
