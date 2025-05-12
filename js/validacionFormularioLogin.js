document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    form.addEventListener("submit", function (e) {
        const pass = document.getElementById("password").value;
        const repass = document.getElementById("repassword").value;

        if (pass !== repass) {
            e.preventDefault();
            alert("Las contraseñas no coinciden.");
        }
    });
});
