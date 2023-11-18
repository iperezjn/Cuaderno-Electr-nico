<?php
// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    // Validaciones (puedes agregar más según tus necesidades)
    if ($password !== $confirmPassword) {
        echo "Las contraseñas no coinciden.";
        exit();
    }

    // Conexión a la base de datos (configura tus credenciales)
    $conn = new mysqli("localhost", "Perez", "123456789", "bdlogin");

    // Verificar si el usuario ya existe en la base de datos
    $checkUserQuery = "SELECT * FROM usuarios WHERE username = '$username'";
    $result = $conn->query($checkUserQuery);
    if ($result->num_rows > 0) {
        echo "El usuario ya está registrado.";
        exit();
    }

    // Insertar el nuevo usuario en la base de datos
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash de la contraseña
    $insertUserQuery = "INSERT INTO usuarios (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";
    if ($conn->query($insertUserQuery)) {
        echo "Registro exitoso. Ahora puedes iniciar sesión.";
    } else {
        echo "Error al registrar el usuario: " . $conn->error;
    }

    $conn->close(); // Cerrar la conexión a la base de datos
}
?>