<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800">💳 Deudas</h2>
    </x-slot>

    <div class="p-6 max-w-6xl mx-auto">

        <div class="bg-white shadow rounded-xl overflow-hidden">

            <table class="w-full text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2">Cliente</th>
                        <th>Total</th>
                        <th>Pagado</th>
                        <th>Falta</th>
                        <th>Acción</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($debts as $debt)

                    @php
                        $paid = $debt->payments->sum('amount');
                        $remaining = $debt->total - $paid;
                    @endphp

                    <tr class="border-t">
                        <td class="p-2">{{ $debt->customer->name }}</td>
                        <td>${{ $debt->total }}</td>
                        <td>${{ $paid }}</td>
                        <td class="text-red-600">${{ $remaining }}</td>

                        <td class="p-2">

                            @if(!$debt->paid)
                                <form method="POST" action="{{ route('debts.pay', $debt->id) }}"
                                      class="flex gap-2">
                                    @csrf
                                    <input type="number" name="amount"
                                           class="border p-1 w-24"
                                           placeholder="Abono">
                                    <button class="bg-green-600 text-white px-3 rounded">
                                        Pagar
                                    </button>
                                </form>
                            @else
                                <span class="text-green-600 font-bold">Pagado ✓</span>
                            @endif

                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>

        </div>

    </div>
</x-app-layout>