

document.addEventListener('DOMContentLoaded', () => {
    //search bar:
    const searchInput = document.getElementById('deskSearch');
    const searchIcon = document.getElementById('searchIcon');

    // when user clicks search icon to search
    searchIcon.addEventListener("click", function (event) {
        let search = searchInput.value;
        event.preventDefault();
        clearFilters();
        loadProducts(search);
    });

    // when user is pressing enter to search
    searchInput.addEventListener("keyup", function (event) {
        if (event.key === "Enter") {
            let search = searchInput.value;
            event.preventDefault();
            clearFilters();
            loadProducts(search);
        }
    });
});

//filters and categories are independant of eachother

//HANDLE CATEGORIES FIRST:
// Global scope for selected category
let selectedCategory = "";

document.addEventListener('DOMContentLoaded', () => {
    //get category containers
    const desktopContainer = document.querySelector('.categories-desk'); // Desktop container
    const mobileContainer = document.querySelector('.categories-mobile'); // Mobile container


    // Desktop container event listener
    if (desktopContainer) {
        desktopContainer.addEventListener('click', (event) => {
            if (event.target.classList.contains('category')) {
                //get content within the category (its value)
                const category = event.target.innerText.trim();
                //assign to selectedCategory parameter
                selectedCategory = category;
                //call product load again - with no other filters attached
                loadProducts('', selectedCategory, '', '', '');
            }
        });
    }

    // Mobile container event listener
    if (mobileContainer) {
        mobileContainer.addEventListener('click', (event) => {
            if (event.target.classList.contains('category-mob')) {
                const categoryMob = event.target.innerText.trim();
                selectedCategory = categoryMob;
                loadProducts('', selectedCategory, '', '', '');
            }
        });
    }
});

// HANDLE FILTERS:
function applyFilters() {
    //get all checkboxes
    const colourInputs = document.getElementsByClassName('colourCheckbox');
    let selectedColours = "";

    // Collect selected colours, loop through and get checked boxes
    for (let i = 0; i < colourInputs.length; i++) {
        if (colourInputs[i].checked) {
            selectedColours += colourInputs[i].value + ",";
        }
    }

    // Remove trailing comma
    selectedColours = selectedColours.replace(/,$/, '');

    const brandInputs = document.getElementsByClassName('brandCheckbox');
    let selectedBrands = "";

    // Collect selected brands
    for (let i = 0; i < brandInputs.length; i++) {
        if (brandInputs[i].checked) {
            selectedBrands += brandInputs[i].value + ",";
        }
    }
    selectedBrands = selectedBrands.replace(/,$/, '');

    //collect selected price
    const priceInputs = document.getElementsByClassName('priceInput');
    let selectedPrice = "";
    for (let i = 0; i < priceInputs.length; i++) {
        if (priceInputs[i].checked) {
            selectedPrice += priceInputs[i].value;
        }
    }

    // Call loadProducts with applied filters
    loadProducts('', selectedCategory, selectedColours, selectedBrands, selectedPrice);
}

// Function to load products based on parameters
function loadProducts(search = '', category = '', colour = '', brand = '', price = '') {
    // Build the request URL
    let requestUrl = 'getProducts.php';
    let queryString = '';

    //if search bar was used
    if (search !== '') {
        queryString += `search=${encodeURIComponent(search)}&`;
    }

    // Include category if clicked
    if (category !== '') {
        queryString += `category=${encodeURIComponent(category)}&`;
    }

    if (colour !== '') {
        queryString += `colour=${encodeURIComponent(colour)}&`;
    }
    if (brand !== '') {
        queryString += `brand=${encodeURIComponent(brand)}&`;
    }
    if (price !== '') {
        queryString += `price=${encodeURIComponent(price)}`;
    }

    // Remove trailing '&' from the querystring
    queryString = queryString.replace(/&$/, '');

    // Append filters to the request URL
    if (queryString !== '') {
        requestUrl = requestUrl + '?' + queryString;
    }

    // AJAX request to fetch products
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function () {
        const productList = JSON.parse(this.responseText);

        //get products container from HTML
        const container = document.getElementById('prod-container');

        // Clear the container - clears each time so that duplicate products are not shown
        container.innerHTML = '';

        // Populate container with product items
        if (productList.length > 0) {

            productList.forEach((product) => {

                // wrap each item in an a tag
                const link = document.createElement('a');
                link.setAttribute('href', 'Item.php?id=' + product.prodOptionID + '&category=' + product.Category + '&brand=' + product.Brand);


                const productDiv = document.createElement('div');
                productDiv.classList.add('product', 'radius');
                productDiv.appendChild(link);

                const imgElement = document.createElement('img');
                imgElement.setAttribute('src', product.Image);
                imgElement.setAttribute('alt', product.Name);
                imgElement.classList.add('radius');
                productDiv.appendChild(imgElement);
                link.appendChild(imgElement);

                const nameElement = document.createElement('h6');
                nameElement.innerText = product.Name;
                productDiv.appendChild(nameElement);

                const priceHolder = document.createElement('div');
                priceHolder.classList.add('price-holder');

                const brandElement = document.createElement('p');
                brandElement.innerText = product.Brand;
                priceHolder.appendChild(brandElement);
                brandElement.classList.add('product-brand');


                const priceElement = document.createElement('p');
                priceElement.innerText = '£' + product.Price;
                priceElement.classList.add('price');
                priceHolder.appendChild(priceElement);

                productDiv.appendChild(priceHolder);

                const cartButton = document.createElement('button');
                cartButton.innerText = "ADD TO CART";
                cartButton.classList.add('cart-btn');
                productDiv.appendChild(cartButton);

                container.appendChild(productDiv);
            });
        } else {
            container.innerHTML = '<p>No products found.</p>';
        }
    };

    //error message
    xmlhttp.onerror = function () {
        console.error("Failed to load products.");
    };

    xmlhttp.open("GET", requestUrl, true);
    xmlhttp.send();
}

function clearFiltersAndLoad() {
    clearFilters();
    loadProducts();
}

// Function to clear filters
function clearFilters() {
    // Uncheck all checkboxes
    const colourCheckboxes = document.querySelectorAll('.colourCheckbox');
    const brandCheckboxes = document.querySelectorAll('.brandCheckbox');

    colourCheckboxes.forEach((checkbox) => (checkbox.checked = false));
    brandCheckboxes.forEach((checkbox) => (checkbox.checked = false));
}

// Attach clearFilters function to the "clear filters" button
document.addEventListener('DOMContentLoaded', () => {
    const clearButton = document.getElementById('clearFilters');
    if (clearButton) {
        clearButton.addEventListener('click', clearFiltersAndLoad);
    }
});

// The first initial load of products with no filters
//search, category, colour, brand, price parameters initially empty
loadProducts();
