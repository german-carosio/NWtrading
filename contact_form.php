<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define las variables
    $destinatario = 'carosiogerman@gmail.com';
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    // Estilos CSS
    $css = "
        <style>
            /* Agrega estilos CSS aquí */
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }
            .container {
                max-width: 600px;
                margin: 20px auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            h2 {
                color: #333;
            }
            p {
                color: #666;
            }
        </style>
    ";

    // Construye el contenido del correo electrónico en formato HTML
    $contenido = "
        <html>
        <head>
            <title>Formulario de contacto</title>
            $css
        </head>
        <body>
            <div class='container'>
                <h2>Información de contacto:</h2>
                <ul>
                    <li><strong>Nombre:</strong> $nombre</li>
                    <li><strong>Email:</strong> $email</li>
                    <li><strong>Teléfono:</strong> $telefono</li>
                </ul>
                <h2>Asunto:</h2>
                <p>$asunto</p>
                <h2>Mensaje:</h2>
                <p>$mensaje</p>
            </div>
        </body>
        </html>
    ";

    // Encabezados para enviar el correo en formato HTML
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

    // Envía el correo electrónico
    if (mail($destinatario, $asunto, $contenido, $headers)) {
        // Redirige al usuario después de enviar el formulario
        header('Location: enviado.html');
        exit;
    } else {
        // Captura el error
        $error = error_get_last();
        echo "Error en el envío de correo: " . $error['message'];
    }
}
?>
