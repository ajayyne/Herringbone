document.addEventListener('DOMContentLoaded', () => {
    //mobile elements
    const mobileSearch = document.getElementById('search');
    const mobileIcon = document.getElementById('mobileSearch');
    // desktop elements
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

    if (mobileSearch && mobileIcon) {
        mobileIcon.addEventListener("click", function (event) {
            let search1 = mobileSearch.value;
            event.preventDefault();
            clearFilters();
            loadProducts(search1);
        });
    
        mobileSearch.addEventListener("keyup", function (event) {
            if (event.key === "Enter") {
                let search2 = mobileSearch.value;
                event.preventDefault();
                clearFilters();
                loadProducts(search2);
            }
        });
    }
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
function generateGetproductsURL(search = '', category = '', colour = '', brand = '', price = '')
{
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

   return requestUrl;

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



// if query string has something in it, run loadProducts with the params
