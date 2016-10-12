

<p>
    {{ link_to_action('IngredientController@create', 'Crear un ingrediente', [], []) }} |
    {{ link_to_action('IngredientController@index', 'Ingredientes', [], []) }}

    @if(auth()->user()->role_id === 1)
        | {{ link_to_route('admin.panel', 'Administracion', []) }}
    @endif
</p>