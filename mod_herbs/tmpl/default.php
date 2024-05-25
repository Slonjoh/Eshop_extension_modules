<?php
// No direct access
defined('_JEXEC') or die;
?>

<div class="product-options">
    <form id="eshop-form" class="eshop-form">
        <select id="herbs" name="product_id" onchange="updateForm()">
            <option value="" data-price="0">--- Select Herbs---</option>
            <?php foreach ($products as $product) : ?>
                <option value="<?php echo $product->id; ?>" data-price="<?php echo $product->product_price; ?>">
                    <?php echo $product->product_name; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <div class="option">
            <label for="quantity">Quantity:</label><br>
            <input id="quantity" min="1" name="quantity" type="number" value="1" onchange="updateForm()">
        </div>
        <div class="option">
            <label for="price">Price:</label><br>
            <span id="price">0.00</span>
        </div>
        <div id="add-to-cart-container"></div>
        <input type="hidden" name="option" value="com_eshop">
        <input type="hidden" name="task" value="cart.add">
        <input type="hidden" name="return" value="<?php echo base64_encode(JUri::getInstance()->toString()); ?>">
    </form>
</div>

<style>
    .product-options {
        border: 1px solid #ddd;
        padding: 15px;
        border-radius: 5px;
        max-width: 300px;
        margin: 0 auto;
        background-color: #f9f9f9;
    }
    .product-options .option {
        margin-bottom: 15px;
    }
    .product-options label {
        font-weight: bold;
    }
    .product-options input[type="radio"],
    .product-options select,
    .product-options input[type="number"] {
        margin-top: 5px;
        margin-bottom: 5px;
    }
    .product-options .btn-primary {
        background-color: #00008b; /* Deep blue */
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .product-options .btn-primary:hover {
        background-color: #000080; /* Darker deep blue */
    }
</style>

<script>
function updatePrice() {
    var select = document.getElementById('herbs');
    var price = select.options[select.selectedIndex].getAttribute('data-price');
    document.getElementById('price').innerText = parseFloat(price).toFixed(2);
}

function updateForm() {
    updatePrice();
    var select = document.getElementById('herbs');
    var quantity = document.getElementById('quantity').value;
    var productId = select.options[select.selectedIndex].value;
    var container = document.getElementById('add-to-cart-container');

    // Clear the container
    container.innerHTML = '';

    // Create the input button
    if (productId) {
        var button = document.createElement('input');
        button.type = 'button';
        button.className = 'btn btn-primary';
        button.id = 'add-to-cart-' + productId;
        button.value = 'Add to Cart';
        button.setAttribute('onclick', `addToCart(${productId}, ${quantity}, 'https://wavingtreefarm.com/', '', 'popout', '/index.php/shops/shopping-cart', 'Item added to cart. Please refresh page.')`);
        container.appendChild(button);
    }
}

function addToCart(productId, quantity, url, param1, param2, cartUrl, message) {
    console.log('Product ID:', productId);
    console.log('Quantity:', quantity);

    // Check if productId is valid
    if (!productId) {
        alert('Please select a product.');
        return;
    }

    // Form data
    var formData = new FormData();
    formData.append('id', productId);  // Use 'id' as expected by the server-side code
    formData.append('quantity', quantity);
    formData.append('option', 'com_eshop');
    formData.append('task', 'cart.add');
    formData.append('return', '<?php echo base64_encode(JUri::getInstance()->toString()); ?>');

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'index.php?option=com_eshop&task=cart.add', true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            try {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    alert(message);
                    // Optionally, you can update the cart display here
                } else {
                    alert('Failed to add product to cart.');
                }
            } catch (e) {
                alert('Failed to add product to cart.');
            }
        }
    };
    xhr.send(formData);
}

// Initialize the form with the default state
updateForm();
</script>
