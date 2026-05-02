<h1>Mis tiendas</h1>

<a href="{{ route('stores.create') }}">Crear tienda</a>

<ul>
@foreach($stores as $store)
    <li>{{ $store->name }}</li>
@endforeach
</ul>