document.addEventListener('DOMContentLoaded', function() {
    // Get all favorite buttons from the item page
    const favoriteButtons = document.querySelectorAll('.favorite-btn');

    // on page load, update the heart icon to reflect if item is in the faves array or not
    const favorites = getFavorites();
    favoriteButtons.forEach(button => {
        const itemId = button.getAttribute('data-id');
        const icon = button.querySelector('i');

        if (favorites.includes(itemId)) {
            icon.classList.remove('fa-regular');
            icon.classList.add('fa-solid');
        } else {
            icon.classList.remove('fa-solid');
            icon.classList.add('fa-regular');
        }
    });

    // for each heart icon, call function to toggle adding and removing from faves array
    favoriteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const itemId = this.getAttribute('data-id');
            addToFavorites(itemId, this);
        });
    });

    // Adding and removing items from the faves array
    function addToFavorites(itemId, button) {
        let favorites = getFavorites();
        // heart icon
        const icon = button.querySelector('i');
        // looks for the item ID within the array
        const index = favorites.indexOf(itemId);


        if (index === -1) {
            // Add to favorites by pushing itemID to faves array
            favorites.push(itemId);
            icon.classList.remove('fa-regular');
            icon.classList.add('fa-solid');
        } else {
            // Remove from favorites by removing itemID from faves array
            favorites.splice(index, 1);
            icon.classList.remove('fa-solid');
            icon.classList.add('fa-regular');
            // remove item immediately from favorites page
            window.location.href = 'Favorites.php';
        }

        setFavorites(favorites);
    }

    // get the fave items from the faves array
    function getFavorites() {
      
        const cookies = document.cookie.split('; ');
        const faveCookie = cookies.find(cookie => cookie.startsWith('favorites='));
        if (faveCookie) {
            return JSON.parse(decodeURIComponent(faveCookie.split('=')[1]));
        }
        return [];
    }

    // save the faves array to a cookie
    function setFavorites(favorites) {
       
        const expires = new Date(Date.now() + 30 * 24 * 60 * 60 * 1000).toUTCString(); // 30 days
        document.cookie = `favorites=${encodeURIComponent(JSON.stringify(favorites))}; expires=${expires}; path=/`;
    }
});
