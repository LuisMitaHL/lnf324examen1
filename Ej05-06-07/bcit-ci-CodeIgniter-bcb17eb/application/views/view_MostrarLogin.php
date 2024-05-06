<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            background-color: lightblue;
        }
        h1 {
            color: navy;
            margin-left: 20px;
        }
    </style>
</head>
<body>

    <h2>Inicia sesión</h2>
    <form action="/Login/IniciaSesion" method="post">
        <label for="usuario">Usuario:</label><br>
        <input type="text" id="usuario" name="usuario" required><br>
        <label for="contrasena">Contraseña:</label><br>
        <input type="password" id="contrasena" name="contrasena" required><br>
        
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
