<h1>Crear producto</h1>

<form method="POST" action="{{ route('products.store') }}">
    @csrf
    <input type="text" name="name" placeholder="Nombre">
    <input type="number" step="0.01" name="price" placeholder="Precio">
    <input type="number" name="stock" placeholder="Stock">
    <button type="submit">Guardar</button>
</form>