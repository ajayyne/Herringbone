// handle items being added and removed from the cart 

document.addEventListener('DOMContentLoaded', function () {

      // for quantity form on Item.php -> form should not submit without selected quantity
    //   quantity input should represent how many times the item should be added to the cart array
      document.querySelectorAll('.basket-form').forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault(); 

            // get the quantity input
            const quantityInput = this.querySelector('input[name="quantity"]');
            // get the quantity value (e.g 2)
            const quantity = parseInt(quantityInput.value);
            const button = this.querySelector('.itemCartButton');
            const productId = button.getAttribute('data-id');

            if (!quantity || quantity < 1) {
                alert("Please enter a quantity between 1 and 5.");
                return;
            }

            // Add the product to the cart array Xquantity amount (x2)
            for (let i = 0; i < quantity; i++) {
                addToCart(productId); 
            }

            // updates the basket icon counter
            updateBasketCounter(); 

            alert(`Added ${quantity} of item ${productId} to your cart!`);
        });
    });


    // // Get all cart buttons on item page
    // const cartButtons = document.querySelectorAll('.itemCartButton');
  
    // // when clicked, add item to the cart
    // cartButtons.forEach(button => {
    //     button.addEventListener('click', function () {

    //         const itemId = this.getAttribute('data-id');
    //         // addToCart(itemId);
    //     });
    // });

    // for buttons on products.php - ensures they are targered even if cart.js runs before they are rendered out
    document.addEventListener('click', function (event) {
        // Check if a cart button was clicked
        if (event.target.matches('.cart-btn')) {
            const itemId = event.target.getAttribute('data-id');
            console.log("Delegated click: Item ID", itemId);
            addToCart(itemId);
        }
    });

    // Adding and removing items from the cart array
    function addToCart(itemId) {
        let cart = getCart();
        cart.push(itemId);
        setCart(cart);
    }

    // get the items from the cart array
    function getCart() {
        const cookies = document.cookie.split('; ');
        const cartCookie = cookies.find(cookie => cookie.startsWith('cart='));
        if (cartCookie) {
            return JSON.parse(decodeURIComponent(cartCookie.split('=')[1]));
        }
        return [];
    }

    function updateBasketCounter() {
        // get the current array
        const cart = getCart(); 
        // get the count of id's within (e.g = 2)
        const count = cart.length;
        const counter = document.querySelector('.basket-counter p');
    
        if (counter) {
            // insert the number of items in the array, into the p tag
            counter.textContent = count;
        }
    }

    // save the cart array to a cookie
    function setCart(cart) {

        const expires = new Date(Date.now() + 30 * 24 * 60 * 60 * 1000).toUTCString(); // 30 days
        document.cookie = `cart=${encodeURIComponent(JSON.stringify(cart))}; expires=${expires}; path=/`;
    }

});
