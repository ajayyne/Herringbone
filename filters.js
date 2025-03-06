const button = document.getElementById('filterButton');
const filters = document.getElementById('filters');

button.addEventListener('click', function() {
    if (filters.style.display === "none" || filters.style.display === "") {
        filters.style.display = "block"; 
    } else {
        filters.style.display = "none"; 
    }
});