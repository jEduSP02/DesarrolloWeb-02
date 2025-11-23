<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];

    // Conectarse a la base de datos
    $servername = "localhost"; // Cambia esto según tu configuración
    $username = "jESP"; // Cambia esto según tu configuración
    $password = "2025.jESP.amaruTECH"; // Cambia esto según tu configuración
    $dbname = "usuariosdbm"; // Cambia al nombre de tu base de datos

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Validación básica
    if ($nombre === '') $errors[] = 'Nombre requerido.';
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) $errors[] = 'Correo inválido.';

    // 1. SANITIZACIÓN Y VALIDACIÓN DE ENTRADAS
    // htmlspecialchars previene XSS. trim elimina espacios en blanco innecesarios.
    $nombre = htmlspecialchars(trim($_POST['nombre'])); 
    // filter_var limpia el correo de caracteres no válidos.
    $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL); 

    // Obtener el último código
    $stmt = $conn->query('SELECT MAX(id) AS max_cod FROM usuariosm');
    $row = $stmt->fetch_assoc();

    // Incrementar el código
    if ($row['max_cod'] === null) {
        $nuevo_codigo = 1; // Si no hay códigos, comenzamos con 1
    } else {
        $nuevo_codigo = intval($row['max_cod']) + 1; // Incrementar el último código
    }

    // Formatear a 5 dígitos
    $codigo = str_pad($nuevo_codigo, 5, '0', STR_PAD_LEFT);

    // Preparar y enlazar
    $stmt = $conn->prepare("INSERT INTO usuariosm (id,nombre, correo, mensaje) VALUES (?,?, ?, ?)");
    $stmt->bind_param("isss", $codigo, $nombre, $correo, $mensaje);

    // Ejecutar y cerrar
    if ($stmt->execute()) {
        echo "<p>Gracias, $nombre. Tu mensaje ha sido enviado.</p>";
    } else {
        echo "<p>Error al enviar el mensaje: " . $stmt->error . "</p>";
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Contacto</title>
</head>
<body>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <div class="wrapper">
        <!-- Botón hamburguesa -->
        <button id="menu-toggle" class="hamburger" aria-label="Abrir menú">
        &#9776;  <!-- ☰ -->
        </button>
        <!-- Menú lateral -->
        <nav id="side-nav" class="side-nav">
            <button id="menu-close" class="close-btn" aria-label="Cerrar menú">&times;</button>
            <ul>
                <li><a href=""></a></li>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="biblio.html">Acerca de...</a></li>
                <li><a href="pasatiempos.html">Pasatiempos</a></li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
        </nav>
        <header>
            <h1>Contacto</h1>
        </header>
    <main>
        <form action="contacto.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" required>

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" required></textarea>

            <button type="submit">Enviar</button>
        </form>
    </main>
    <footer>
            <p>&copy; 2025 Elaborado por: jESP</p>
    </footer>
      <script src="script.js"></script>
</body>
</html>
