// handle items being added and removed from the cart 

document.addEventListener('DOMContentLoaded', function() {
    // Get all cart buttons on item page
    const cartButtons = document.querySelectorAll('.itemCartButton');
    // get all cart buttons from the shopping page (quick add)
    const quickCartButtons = document.querySelectorAll('.cart-btn')


    // when clicked, add item to the cart
    cartButtons.forEach(button => {
        button.addEventListener('click', function () {
            const itemId = this.getAttribute('data-id');
            addToFavorites(itemId);
        });
    });

    // Adding and removing items from the faves array
    function addToFavorites(itemId) {
        let cart = getCart();
   
        // looks for the item ID within the array
        const index = cart.indexOf(itemId);
        alert(itemId);
    
        if (index === -1) {
            // Add to cart by pushing itemID to faves array
            cart.push(itemId);
            alert('Item added to cart!');
        }
        setCart(cart);
    }

    // get the fave items from the faves array
    function getCart() {
        // alert(document.cookie);
        const cookies = document.cookie.split('; ');
        const cartCookie = cookies.find(cookie => cookie.startsWith('cart='));
        if (cartCookie) {
            return JSON.parse(decodeURIComponent(cartCookie.split('=')[1]));
        }
        return [];
    }

    // save the faves array to a cookie
    function setCart(cart) {
      
        const expires = new Date(Date.now() + 30 * 24 * 60 * 60 * 1000).toUTCString(); // 30 days
        document.cookie = `cart=${encodeURIComponent(JSON.stringify(cart))}; expires=${expires}; path=/`;
    }
});
