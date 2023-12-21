// Function to show the cookies consent pop-up
function showCookiesPopup() {
    const popup = document.getElementById("cookies-popup");
    popup.style.display = "block";
}

// Function to hide the cookies consent pop-up and set the cookies acceptance flag
function acceptCookies() {
    const popup = document.getElementById("cookies-popup");
    popup.style.display = "none";

    // Set a flag or cookie to indicate that the user accepted cookies
    setCookie("cookiesAccepted", "true", 365); // Set the cookie to last for 365 days
}

// Function to set a cookie with a name, value, and expiration days
function setCookie(name, value, expirationDays) {
    const expirationDate = new Date();
    expirationDate.setDate(expirationDate.getDate() + expirationDays);

    const cookieString = `${name}=${value}; expires=${expirationDate.toUTCString()}; path=/;`;
    document.cookie = cookieString;
}

// Check if the user has already accepted cookies
const cookiesAccepted = getCookie("cookiesAccepted");
if (!cookiesAccepted) {
    showCookiesPopup();
}

// Function to get the value of a specific cookie by its name
function getCookie(name) {
    const cookies = document.cookie.split(";");

    for (let i = 0; i < cookies.length; i++) {
        const cookie = cookies[i].trim();
        if (cookie.startsWith(name + "=")) {
            return cookie.substring(name.length + 1);
        }
    }

    return null;
}
