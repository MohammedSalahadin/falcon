// to display the general tab form and to not display the other tab forms
function showGeneral() {
    document.getElementById('general').style.display = "block";
    document.getElementById('notifications').style.display = "none";
    document.getElementById('email').style.display ="none";
    document.getElementById('team-software').style.display = "none";
    document.getElementById('logo').style.display = "none"
}
// to display the notifications tab form and to not display the other tab forms
function showNotifications() {
    document.getElementById('notifications').style.display = "block";
    document.getElementById('general').style.display = "none";
    document.getElementById('email').style.display ="none";
    document.getElementById('team-software').style.display = "none";
    document.getElementById('logo').style.display = "none"
}
// to display the email tab form and to not display the other tab forms
function showEmail() {
    document.getElementById('email').style.display = "block";
    document.getElementById('team-software').style.display = "none";
    document.getElementById('notifications').style.display = "none";
    document.getElementById('general').style.display = "none";
    document.getElementById('logo').style.display = "none"
}
// to display the logos tab form and to not display the other tab forms
function showLogo() {
    document.getElementById('logo').style.display = "block";
    document.getElementById('email').style.display = "none";
    document.getElementById('team-software').style.display = "none";
    document.getElementById('notifications').style.display = "none";
    document.getElementById('general').style.display = "none";
}
// to display the team-software tab form and to not display the other tab forms
function showSoftware(){
    document.getElementById('team-software').style.display = "block";
    document.getElementById('notifications').style.display = "none";
    document.getElementById('general').style.display = "none";
    document.getElementById('email').style.display = "none";
    document.getElementById('logo').style.display = "none"
}