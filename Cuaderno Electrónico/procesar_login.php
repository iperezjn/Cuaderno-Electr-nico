<?php
session_start();

// Verifica si se enviaron datos del formulario
if (isset($_POST['Perez']) isset($_POST['123456789'])) {
    $username = $_POST['Perez'];
    $password = $_POST['123456789'];

    // Comprueba las credenciales (reemplaza esto con tu propia lógica de autenticación)
    if ($username === 'Perez' $password === '123456789') {
        // Inicio de sesión exitoso
        $_SESSION['username'] = $username;
        header('Location: perfil.html'); // Redirige a la página de bienvenida
    } else {
        echo "Credenciales incorrectas. <a href='index.html'>Inténtalo de nuevo</a>";
    }
}
?>

