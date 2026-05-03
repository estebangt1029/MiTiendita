<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            📦 Productos
        </h2>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">

            <!-- BOTÓN CREAR -->
            <div class="mb-6 flex justify-between items-center">
                <h1 class="text-2xl font-bold text-gray-800">Lista de productos</h1>

                <a href="{{ route('products.create') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded-xl shadow hover:bg-blue-700 transition">
                    ➕ Crear producto
                </a>
            </div>

            <!-- TABLA -->
            <div class="bg-white shadow rounded-2xl overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm text-left">
                        <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                            <tr>
                                <th class="px-6 py-3">Producto</th>
                                <th class="px-6 py-3">Precio</th>
                                <th class="px-6 py-3">Stock</th>
                                <th class="px-6 py-3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">

                            @forelse($products as $product)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 font-medium text-gray-800">
                                        {{ $product->name }}
                                    </td>

                                    <td class="px-6 py-4 text-green-600 font-semibold">
                                        ${{ $product->price }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $product->stock ?? 'N/A' }}
                                    </td>

                                    <td class="px-6 py-4 flex gap-2">
                                        <a href="{{ route('products.edit', $product) }}"
                                           class="bg-yellow-400 text-white px-3 py-1 rounded-lg text-xs hover:bg-yellow-500">
                                            Editar
                                        </a>

                                        <form action="{{ route('products.destroy', $product) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                onclick="return confirm('¿Eliminar producto?')"
                                                class="bg-red-500 text-white px-3 py-1 rounded-lg text-xs hover:bg-red-600">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-6 text-gray-500">
                                        No hay productos registrados
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>