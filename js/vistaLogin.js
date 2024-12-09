document.getElementById('login-form').addEventListener('submit', async (event) => {
    event.preventDefault(); 
    
    const username = document.getElementById('txtusername').value;
    const password = document.getElementById('txtpassword').value;
    const errorMessage = document.getElementById('error-message');

    errorMessage.style.display = 'none';

  
    if (!username || !password) {
        showErrorMessage('Por favor, ingresa ambos campos');
        return;
    }

    try {
        const response = await fetch('/controllers/controladorLogin.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                txtusername: username,
                txtpassword: password
            })
        });

        if (response.ok) {
            window.location.href = '/controllers/controladorVista.php';
        } else if (response.status === 401) {
            showErrorMessage('Usuario o contraseña incorrectos.');
        } else {
            showErrorMessage('Ocurrió un error inesperado. Por favor, intenta nuevamente.');
        }
    } catch (error) {
        showErrorMessage('Error de conexión con el servidor.');
    }
});
//ventana de error
function showErrorMessage(message) {
    const errorMessage = document.getElementById('error-message');
    errorMessage.textContent = message;
    errorMessage.style.display = 'block';

    //boton de cerrar el mensaje 

    if (!errorMessage.querySelector('.close-btn')) {
        const closeButton = document.createElement('button');
        closeButton.textContent = 'Cerrar';
        closeButton.classList.add('close-btn');
        closeButton.onclick = () => {
            errorMessage.style.display = 'none';
            errorMessage.removeChild(closeButton);
        };

        errorMessage.appendChild(closeButton);
    }
}
