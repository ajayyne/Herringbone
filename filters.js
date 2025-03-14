const button = document.getElementById('filterButton');
const filters = document.getElementById('filters');

button.addEventListener('click', function() {
    // Toggle appearance of filter div
    if (filters.style.display === "none" || filters.style.height === "0px" || filters.style.height === "") {
        filters.style.display = "block";

        // Using requestAnimationFrame to ensure the height is set correctly after the content is displayed
        requestAnimationFrame(function() {
            filters.style.height = filters.scrollHeight + 'px';
        });
        
    } else {
        filters.style.height = "0px";

        // Add a transition + event listener to set display to none after the collapse is done
        filters.addEventListener('transitionend', function onTransitionEnd() {
            filters.style.display = "none";
            filters.removeEventListener('transitionend', onTransitionEnd);
        });
    }
});
