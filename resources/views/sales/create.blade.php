<h1>Nueva Venta</h1>

<div style="display:flex; gap:40px;">

    <!-- PRODUCTOS -->
    <div>
        <h3>Productos</h3>

        @foreach($products as $product)
            <div>
                {{ $product->name }} (${{ $product->price }})
                <button onclick="addProduct({{ $product->id }}, '{{ $product->name }}', {{ $product->price }})">
                    Agregar
                </button>
            </div>
        @endforeach
    </div>

    <!-- CARRITO -->
    <div>
        <h3>Carrito</h3>

        <form method="POST" action="{{ route('sales.store') }}">
            @csrf

            <div id="cart"></div>

            <h3>Total: $<span id="total">0</span></h3>
            <select name="type">
    <option value="cash">Contado</option>
    <option value="credit">Fiado</option>
</select>
<input type="number" placeholder="o valor" onchange="setByMoney(index, this.value)">
<input type="text" name="customer_name" placeholder="Nombre del cliente (si es fiado)">

            <button type="submit">Guardar Venta</button>
        </form>
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
        total += product.price * product.quantity;

        cartDiv.innerHTML += `
            <div>
                ${product.name} - $${product.price}
                <input type="number" value="${product.quantity}" min="1"
                    onchange="updateQuantity(${index}, this.value)">
                
                <input type="hidden" name="products[${index}][id]" value="${product.id}">
                <input type="hidden" name="products[${index}][price]" value="${product.price}">
                <input type="hidden" name="products[${index}][quantity]" value="${product.quantity}">
            </div>
        `;
    });

    document.getElementById('total').innerText = total;
}

function updateQuantity(index, value) {
    cart[index].quantity = parseInt(value);
    renderCart();
}

function setByMoney(index, money) {
    let product = cart[index];
    product.quantity = money / product.price;
    renderCart();
}
</script>