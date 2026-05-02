<h1>Productos</h1>

<a href="{{ route('products.create') }}">Crear producto</a>

<ul>
@foreach($products as $product)
    <li>{{ $product->name }} - ${{ $product->price }}</li>
@endforeach
</ul>