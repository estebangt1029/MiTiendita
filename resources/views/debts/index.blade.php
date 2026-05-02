<h1>Deudas</h1>

<table border="1">
    <tr>
        <th>Cliente</th>
        <th>Total</th>
        <th>Pagado</th>
        <th>Falta</th>
        <th>Acción</th>
    </tr>

    @foreach($debts as $debt)

    @php
        $paid = $debt->payments->sum('amount');
        $remaining = $debt->total - $paid;
    @endphp

    <tr>
        <td>{{ $debt->customer->name }}</td>
        <td>${{ $debt->total }}</td>
        <td>${{ $paid }}</td>
        <td>${{ $remaining }}</td>

        <td>
            @if(!$debt->paid)
            <form method="POST" action="{{ route('debts.pay', $debt->id) }}">
                @csrf
                <input type="number" name="amount" placeholder="Abono">
                <button type="submit">Pagar</button>
            </form>
            @else
                Pagado ✅
            @endif
        </td>
    </tr>

    @endforeach
</table>