<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Dashboard</h1>

<div style="display:grid; grid-template-columns: repeat(2, 1fr); gap:20px;">

    <div style="border:1px solid #ccc; padding:20px;">
        <h3>Ventas de hoy</h3>
        <p>${{ $todaySales }}</p>
    </div>

    <div style="border:1px solid #ccc; padding:20px;">
        <h3>Deudas pendientes</h3>
        <p>${{ $pendingDebts }}</p>
    </div>

    <div style="border:1px solid #ccc; padding:20px;">
        <a href="/sales/create">➕ Nueva venta</a>
    </div>

    <div style="border:1px solid #ccc; padding:20px;">
        <a href="/products">📦 Productos</a>
    </div>

</div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
