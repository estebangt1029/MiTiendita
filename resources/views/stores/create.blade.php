<h1>Crear tienda</h1>

<form method="POST" action="{{ route('stores.store') }}">
    @csrf
    <input type="text" name="name" placeholder="Nombre de la tienda">
    <button type="submit">Crear</button>
</form>