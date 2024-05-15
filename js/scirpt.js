function showAlert() {
    alert("Registration successful!");
}

function getPage(buttonId) {
    window.location.href = 'render.php?button_clicked=' + buttonId;
}