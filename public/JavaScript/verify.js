function validatePassword() {
    var password = document.getElementById("password").value;
    var verifyPassword = document.getElementById("verify_password").value;
    
    if (password !== verifyPassword) {
        alert("Passwords do not match. Please re-enter.");
        return false;
    }
    return true;
}