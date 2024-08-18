
// Attach the event listener to all delete buttons
const deleteForms = document.querySelectorAll('.delete-form');

// Loop through each delete form
deleteForms.forEach(form => {
form.addEventListener('submit', function(event) {
event.preventDefault(); // Prevent form submission

Swal.fire({
title: 'Are you sure?',
text: "You won't be able to revert this!",
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#dc3545',
cancelButtonColor: '#6c757d',
confirmButtonText: 'Yes, delete it!'
}).then((result) => {
if (result.isConfirmed) {
// If user confirms, submit the form
this.submit();
}
});
});
});
