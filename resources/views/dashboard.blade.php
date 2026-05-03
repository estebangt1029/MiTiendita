<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            🏪 Panel de Control - Mi Tiendita
        </h2>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">

            <!-- RESUMEN -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

                <!-- Ventas de hoy -->
                <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
                    <h3 class="text-gray-500 text-sm">Ventas de hoy</h3>
                    <p class="text-3xl font-bold text-green-600 mt-2">
                        ${{ $todaySales }}
                    </p>
                </div>

                <!-- Deudas -->
                <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
                    <h3 class="text-gray-500 text-sm">Deudas pendientes</h3>
                    <p class="text-3xl font-bold text-red-600 mt-2">
                        ${{ $pendingDebts }}
                    </p>
                </div>

                <!-- Mensaje -->
                <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
                    <h3 class="text-gray-500 text-sm">Estado</h3>
                    <p class="text-lg font-semibold mt-2">
                        Sistema funcionando correctamente ✅
                    </p>
                </div>

            </div>

            <!-- ACCIONES -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                <a href="/sales/create"
                   class="bg-blue-600 text-white p-6 rounded-2xl shadow hover:bg-blue-700 transition text-center">
                    <div class="text-2xl mb-2">➕</div>
                    <p class="font-semibold">Nueva Venta</p>
                </a>

                <a href="/products"
                   class="bg-purple-600 text-white p-6 rounded-2xl shadow hover:bg-purple-700 transition text-center">
                    <div class="text-2xl mb-2">📦</div>
                    <p class="font-semibold">Productos</p>
                </a>

                <a href="/debts"
                   class="bg-red-500 text-white p-6 rounded-2xl shadow hover:bg-red-600 transition text-center">
                    <div class="text-2xl mb-2">💳</div>
                    <p class="font-semibold">Fiados</p>
                </a>

                <a href="/sales"
                   class="bg-green-600 text-white p-6 rounded-2xl shadow hover:bg-green-700 transition text-center">
                    <div class="text-2xl mb-2">📊</div>
                    <p class="font-semibold">Historial Ventas</p>
                </a>

            </div>

            <!-- INFO EXTRA -->
            <div class="mt-10 bg-white p-6 rounded-2xl shadow">
                <h3 class="text-lg font-semibold mb-4">📌 Consejos</h3>
                <ul class="list-disc pl-5 text-gray-600 space-y-2">
                    <li>Registra todas las ventas para tener control real del negocio</li>
                    <li>Revisa los fiados constantemente para evitar pérdidas</li>
                    <li>Organiza bien los productos por presentación (kilo, litro, unidad)</li>
                </ul>
            </div>

        </div>
    </div>
</x-app-layout>