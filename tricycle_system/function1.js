// function para sa pagshow and pag hide ng content
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// function para iclose yung menu kapag nag click outside of the button yung user
window.onclick = function(event) {
    if (!event.target.matches('.partner')) {
        var dropdowns = document.getElementsByClassName("partner_content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
};

// registers overlay function
function openRegistration() {
    document.getElementById("registrationOverlay").style.display = "block";
}

function closeRegistration() {
    document.getElementById("registrationOverlay").style.display = "none";
}

// registers overlay function
function openLogin() {
    document.getElementById("loginOverlay").style.display = "block";
}

function closeLogin() {
    document.getElementById("loginOverlay").style.display = "none";
}

function openDetails() {
    document.getElementById("registrationOverlay").style.display = "block";
}

function logOut() {
    window.location.href = "logout.php";
}

function details() {
    window.location.href = "customer_bootstrap.php";
}
function detailsDriver(){
    window.location.href = "driver_profile.php";
}
function detailsOperator(){
    window.location.href = "operator_profile.php";
}

function completeOrder() {
    alert('Order complete!'); // You can customize the alert message
}

// function to clear form fields
function clearForm() {
    document.getElementById("origin").value = "";
    document.getElementById("destination").value = "";

    // Clear confirm details
    var confirmDetails = document.querySelector(".confirm-details");
    if (confirmDetails) {
        confirmDetails.innerHTML = ""; // Clears the content inside the confirm details div
    }
}