// Get the user's name from the data attribute of the hidden div
const userName = document.getElementById('user-name').getAttribute('data-user');

// Get the current hour based on the user's system time
const hours = new Date().getHours();
let greeting = "Good ";

if (hours >= 0 && hours < 12) {
    greeting += "Morning";
} else if (hours >= 12 && hours < 18) {
    greeting += "Afternoon";
} else {
    greeting += "Evening";
}

document.getElementById("greeting").innerHTML = ` ${greeting}, ${userName}.`;
