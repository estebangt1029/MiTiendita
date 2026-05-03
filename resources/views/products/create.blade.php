<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ➕ Crear Producto
        </h2>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded-2xl shadow">

            <h1 class="text-2xl font-bold mb-6 text-gray-800">
                Nuevo producto
            </h1>

            <form method="POST" action="{{ route('products.store') }}" class="space-y-5">
                @csrf

                <!-- Nombre -->
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Nombre del producto</label>
                    <input type="text" name="name"
                        class="w-full border rounded-xl px-4 py-2 focus:ring focus:ring-blue-200"
                        placeholder="Ej: Arroz Diana"
                        required>
                </div>

                <!-- Marca -->
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Marca</label>
                    <input type="text" name="brand"
                        class="w-full border rounded-xl px-4 py-2"
                        placeholder="Ej: Diana">
                </div>

                <!-- Precio -->
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Precio de venta</label>
                    <input type="number" step="0.01" name="price"
                        class="w-full border rounded-xl px-4 py-2"
                        placeholder="Ej: 2500"
                        required>
                </div>

                <!-- Costo (opcional pero clave para futuro) -->
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Costo (opcional)</label>
                    <input type="number" step="0.01" name="cost"
                        class="w-full border rounded-xl px-4 py-2"
                        placeholder="Ej: 1800">
                </div>

                <!-- Tipo -->
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Tipo de venta</label>
                    <select name="type"
                        class="w-full border rounded-xl px-4 py-2">
                        <option value="unit">Por unidad</option>
                        <option value="weight">Por peso / granel</option>
                    </select>
                </div>

                <!-- Unidad -->
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Unidad</label>
                    <select name="unit"
                        class="w-full border rounded-xl px-4 py-2">
                        <option value="unidad">Unidad</option>
                        <option value="kg">Kilogramos</option>
                        <option value="g">Gramos</option>
                        <option value="litro">Litros</option>
                        <option value="ml">Mililitros</option>
                    </select>
                </div>

                <!-- Stock -->
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Stock disponible</label>
                    <input type="number" name="stock"
                        class="w-full border rounded-xl px-4 py-2"
                        placeholder="Ej: 100"
                        required>
                </div>

                <!-- BOTÓN -->
                <div class="pt-4">
                    <button
                        class="w-full bg-blue-600 text-white py-3 rounded-xl font-semibold hover:bg-blue-700 transition">
                        Guardar producto
                    </button>
                </div>

            </form>

        </div>
    </div>
</x-app-layout>