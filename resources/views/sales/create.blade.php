<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            🛒 Nueva Venta
        </h2>
    </x-slot>

    <div class="py-6 px-4">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-6">

            <!-- PRODUCTOS -->
            <div class="bg-white p-4 rounded-2xl shadow">
                <h3 class="text-lg font-semibold mb-4">📦 Productos</h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 max-h-[500px] overflow-y-auto">
                    @foreach($products as $product)
                        <div class="border p-3 rounded-xl flex justify-between items-center">
                            <div>
                                <p class="font-medium">{{ $product->name }}</p>
                                <p class="text-green-600 text-sm">${{ $product->price }}</p>
                            </div>

                            <button
                                onclick="addProduct({{ $product->id }}, '{{ $product->name }}', {{ $product->price }})"
                                class="bg-blue-600 text-white px-3 py-1 rounded-lg text-sm">
                                +
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- CARRITO -->
            <div class="bg-white p-4 rounded-2xl shadow">
                <h3 class="text-lg font-semibold mb-4">🧾 Carrito</h3>

                <form method="POST" action="{{ route('sales.store') }}">
                    @csrf

                    <div id="cart" class="space-y-3 max-h-[300px] overflow-y-auto"></div>

                    <!-- TOTAL -->
                    <div class="mt-4 text-xl font-bold text-green-600">
                        Total: $<span id="total">0</span>
                    </div>

                    <!-- TIPO -->
                    <div class="mt-4">
                        <label class="text-sm text-gray-600">Tipo de pago</label>
                        <select name="type" class="w-full border rounded-lg px-3 py-2">
                            <option value="cash">Contado</option>
                            <option value="credit">Fiado</option>
                        </select>
                    </div>

                    <!-- CLIENTE -->
                    <div class="mt-3">
                        <input type="text" name="customer_name"
                            placeholder="Nombre del cliente (si es fiado)"
                            class="w-full border rounded-lg px-3 py-2">
                    </div>

                    <!-- BOTÓN -->
                    <button
                        class="mt-4 w-full bg-green-600 text-white py-3 rounded-xl font-semibold hover:bg-green-700">
                        Guardar Venta
                    </button>
                </form>
            </div>

        </div>
    </div>

<script>
let cart = [];

function addProduct(id, name, price) {
    let existing = cart.find(p => p.id === id);

    if (existing) {
        existing.quantity++;
    } else {
        cart.push({ id, name, price, quantity: 1 });
    }

    renderCart();
}

function renderCart() {
    let cartDiv = document.getElementById('cart');
    cartDiv.innerHTML = '';

    let total = 0;

    cart.forEach((product, index) => {
        let subtotal = product.price * product.quantity;
        total += subtotal;

        cartDiv.innerHTML += `
            <div class="border p-3 rounded-xl">
                <p class="font-medium">${product.name}</p>
                <p class="text-sm text-gray-500">$${product.price} c/u</p>

                <div class="flex gap-2 mt-2">
                    <input type="number" value="${product.quantity}" min="0.01" step="0.01"
                        onchange="updateQuantity(${index}, this.value)"
                        class="border px-2 py-1 w-20 rounded">

                    <input type="number" placeholder="$"
                        onchange="setByMoney(${index}, this.value)"
                        class="border px-2 py-1 w-24 rounded">
                </div>

                <p class="text-sm mt-2 text-green-600">
                    Subtotal: $${subtotal.toFixed(0)}
                </p>

                <button onclick="removeProduct(${index})"
                    class="text-red-500 text-xs mt-2">
                    Eliminar
                </button>

                <input type="hidden" name="products[${index}][id]" value="${product.id}">
                <input type="hidden" name="products[${index}][price]" value="${product.price}">
                <input type="hidden" name="products[${index}][quantity]" value="${product.quantity}">
            </div>
        `;
    });

    document.getElementById('total').innerText = total.toFixed(0);
}

function updateQuantity(index, value) {
    cart[index].quantity = parseFloat(value);
    renderCart();
}

function setByMoney(index, money) {
    let product = cart[index];
    if (money > 0) {
        product.quantity = money / product.price;
    }
    renderCart();
}

function removeProduct(index) {
    cart.splice(index, 1);
    renderCart();
}
</script>
</x-app-layout>