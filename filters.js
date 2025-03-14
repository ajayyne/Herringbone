const button = document.getElementById('filterButton');
const filters = document.getElementById('filters');

button.addEventListener('click', function() {
    // Check if the filter div is visible
    if (filters.style.maxHeight === "0px" || filters.style.maxHeight === "") {
        // Make the filter div visible
        filters.style.display = "block";
        // Set overflow to visible to show content 
        filters.style.overflow = "visible"; 
        filters.style.maxHeight = filters.scrollHeight + 'px'; 
    } else {
        // Set overflow to hidden before collapsing
        filters.style.overflow = "hidden"; 
        // Set to 0 to close
        filters.style.maxHeight = "0px"; 

        // Wait for the transition to end before hiding completely
        filters.addEventListener('transitionend', function onTransitionEnd() {
            filters.style.display = "none"; 
            filters.removeEventListener('transitionend', onTransitionEnd); 
        });
    }
});
