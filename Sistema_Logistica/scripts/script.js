document.getElementById('login-form').addEventListener('submit', function(event) {
    event.preventDefault();
    const username = document.querySelector('input[name="username"]').value;
    const password = document.querySelector('input[name="password"]').value;

    if(username.length < 3 || password.length < 6) {
        alert("El nombre de usuario debe tener al menos 3 caracteres y la contraseña al menos 6 caracteres.");
        return;
    }

    // Validación adicional si es necesario

    this.submit();
});
