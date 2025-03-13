const button = document.getElementById('filterButton');
const filters = document.getElementById('filters');

button.addEventListener('click', function() {
    //toggle appearance of filter div
    if (filters.style.display === "none" || filters.style.height === "0px" || filters.style.height === "") {
        filters.style.display = "block";
        
        //adding delay
        setTimeout(function() {
            // expand to the content height
            filters.style.height = filters.scrollHeight + "px"; 
        }, 1);
        
    } else {
        filters.style.height = "0px";
        
        // add a transition + event listener to set display to none after the collapse is done
        filters.addEventListener('transitionend', function onTransitionEnd() {
            filters.style.display = "none";
            filters.removeEventListener('transitionend', onTransitionEnd);
        });
    }
});