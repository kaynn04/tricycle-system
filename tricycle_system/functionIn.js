document.addEventListener("DOMContentLoaded", function() {
    var modal = document.getElementById("infoModal");
    var openModalBtn = document.getElementById("openModalBtn");
    var closeModalBtn = document.getElementById("closeModalBtn");
    var infoForm = document.getElementById("infoForm");
    var dashboard = document.querySelector(".dashboard");

    function openModal() {
        modal.style.display = "block";
        dashboard.style.display = "none"; // Hide the dashboard when the modal is open
    }

    function closeModal() {
        modal.style.display = "none";
        dashboard.style.display = "flex"; // Show the dashboard when the modal is closed
    }

    // Event listeners
    openModalBtn.addEventListener("click", openModal);
    closeModalBtn.addEventListener("click", closeModal);

    // Close modal if clicked outside of it
    window.onclick = function(event) {
        if (event.target == modal) {
            closeModal();
        }
    };

    // Handle form submission
    infoForm.addEventListener("submit", function(event) {
        event.preventDefault();
        // Add logic to handle form submission (e.g., AJAX request, validation)
        // After successful submission, you can close the modal and show the dashboard
        closeModal();
        alert("Information submitted successfully! You can now access the full dashboard.");
    });
});