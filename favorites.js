document.addEventListener('DOMContentLoaded', function() {
    // get fave buttons from item page
    const favoriteButtons = document.querySelectorAll('.favorite-btn');
    
    // loop through fave buttons and get the unique ID (product option id)
    // send the product option id into the AddToFavorites funciton
    favoriteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const itemId = this.getAttribute('data-id');
            addToFavorites(itemId);
        });
    });

    // adding an item to favorites:
    function addToFavorites(itemId) {
        // get the user favorites (else: empty array)
        const favorites = getFavorites();

        // if item is not already in the favorites array, add it
        if (!favorites.includes(itemId)) {
            favorites.push(itemId);
            // let the user know the item has been added to their faves
            setFavorites(favorites);
            alert('Item added to favorites!');
        } else {
            alert('Item is already in favorites!');
        }
    }

    // implement cookies to store the favorites array
    function getFavorites() {
        // create cookie 
        const cookies = document.cookie.split('; ');
        const faveCookie = cookies.find(cookie => cookie.startsWith('favorites='));
        if (faveCookie) {
            // break up the string and return an array
            return JSON.parse(decodeURIComponent(faveCookie.split('=')[1]));
        }
        // if theres no favourites found, return the empty array
        return []; 
    }

    function setFavorites(favorites) {
        // cookie will expire in 30 days
        alert(JSON.stringify(favorites));
        const expires = new Date(Date.now() + 30*24*60*60*1000).toUTCString();
        document.cookie = `favorites=${encodeURIComponent(JSON.stringify(favorites))}; expires=${expires}; path=/`;
    }
});