<?php
include '../Ej01/cabecera.php';
?>

<h2>Formulario de registro (Java)</h2>
<form method="get" action="http://localhost:8080/mavenproject2-1.0-SNAPSHOT/NewServlet">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required><br>

    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido" required><br>

    <label for="email">Correo electrónico:</label>
    <input type="email" id="email" name="email" required><br>

    <input type="submit" value="Registrarse">
</form>

<?php
include '../Ej01/pie.php';
?>