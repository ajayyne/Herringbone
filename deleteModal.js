// Trigger button - loop through each brands delete button -> attach event listener
const deleteButtons = document.querySelectorAll('.openDeleteModal');

// Dynamically show modal and populate BrandID
deleteButtons.forEach(button => {
    button.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent default form submission
        const brandID = this.nextElementSibling.value; // Get the BrandID from the hidden input
        document.getElementById('brandID').value = brandID; // Set the BrandID in the modal's hidden input
        modal.style.display = "block"; // Show the modal
    });
});

// Modal
const modal = document.getElementById('deleteModal');

// Close button
const closeBtn = document.getElementById('close');
const closeIcons = document.getElementsByClassName('close');

// confirm deletion on modal -> submit form
const confirmDelete = document.getElementById('confirmDeletion');

// close modal
Array.from(closeIcons).forEach(icon => {
    icon.addEventListener('click', function () {
        modal.style.display = "none";
    });
});

closeBtn.onclick = function () {
    modal.style.display = "none";
};


// // updating modal// Get the modal
// const successModal = document.getElementById('successModal');
// const closeModal = document.querySelector('#successModal .close');

// // Function to show the modal
// function showModal() {
//     successModal.style.display = 'block'; // Display the modal
// }

// // Close the modal when the user clicks the close button
// closeModal.onclick = function () {
//     successModal.style.display = 'none'; // Hide the modal
