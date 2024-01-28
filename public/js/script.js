// hamburger menu


//alert('script');

function toggleMenu() {
    var navbar = document.getElementById("myNavbar");
    navbar.style.transform = navbar.style.transform === "translateX(0)" ? "translateX(-101%)" : "translateX(0)";
}

// Dodana obsługa zdarzenia na kliknięcie poza menu
document.addEventListener('click', function (event) {

    var navbar = document.getElementById("myNavbar");
    var button = document.querySelector('#navMenu');

    if (event.target !== navbar && event.target !== button) {
        // Jeśli kliknięto poza menu i przyciskiem, schowaj menu
        navbar.style.transform = "translateX(-101%)";
    }
});
