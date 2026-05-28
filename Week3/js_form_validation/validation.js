document.getElementById("registerForm").addEventListener("submit", function(e) {
    let email = document.getElementById("email").value;
    if (email === "") {
        e.preventDefault(); // stops form from submitting
        alert("Email field cannot be empty!");
    }
});

document.getElementById("password").addEventListener("input", function() {
    let pass = this.value;
    let status = document.getElementById("passStatus");
    if (pass.length < 6) {
        status.innerText = "Weak (Too short)";
        status.style.color = "red";
    } else {
        status.innerText = "Strong Password";
        status.style.color = "green";
    }
});