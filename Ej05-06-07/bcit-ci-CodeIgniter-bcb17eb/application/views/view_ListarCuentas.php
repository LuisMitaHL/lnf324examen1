<!DOCTYPE html>
<html>
<head>
    <title>Banco de la Fortuna</title>
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
    <?php
    
    if(isset($sesion['usuario'])) {
        echo "Se inició sesión como usuario ".$sesion['usuario'];
        if($sesion['rol'] == 'administrador') {
            echo " con poderes de administrador";
        }
        if($sesion['rol'] == 'director') {
            echo " con el rol y privilegios de Director del Banco";
        }
        echo ". <a href='/index.php/Login/Logout'>Cierra sesión</a>.<br>";
    } else {
        echo "No se inició sesión. <a href='/index.php/Login/'>Iniciar</a>.<br>";
    }


if($sesion['rol'] == 'administrador') {
    ?>
    <h1>Lista de Todas las Cuentas Bancarias</h1>
    <?php

    echo "<table border='1px'><tr><th>ID Cuenta Bancaria</th><th>ID Persona</th><th>Saldo</th><th>Fecha Creacion</th><th>Tipo</th></tr>";
    foreach($filas as $fila) {
        echo "<tr><td>" . $fila->id. "</td><td>" . $fila->id_persona. "</td><td>" . $fila->saldo. "</td><td>" . $fila->fecha_creacion. "</td><td>" . $fila->tipo. "</td></tr>";
    }
    echo "</table>";
    ?>

    <h2>Borrar Cuenta Bancaria</h2>
    <form action="/CuentaBancaria/Eliminar" method="post">
        <label for="id">ID Cuenta Bancaria:</label><br>
        <input type="text" id="id" name="id"><br>
        <input type="submit" value="Eliminar">
    </form>
    <?php }
    
    elseif($sesion['rol'] == "cliente") { ?>
    <h1>Lista de tus cuentas bancarias</h1>
    <?php
        echo "<table border='1px'><tr><th>ID Cuenta Bancaria</th><th>Saldo</th><th>Fecha Creacion</th><th>Tipo</th></tr>";
        foreach($filas as $fila) {
            if($fila->id_persona == $sesion['id_persona']) {
                echo "<tr><td>" . $fila->id. "</td><td>" . $fila->saldo. "</td><td>" . $fila->fecha_creacion. "</td><td>" . $fila->tipo. "</td></tr>";
            }
        }
        echo "</table>";
        
    ?>
    <?php } elseif($sesion['rol'] == "director") { ?>
    <p>Ver las listas de <a href="/index.php/CuentaBancaria/Consolidado">Dinero por Departamento</a></p>
    <?php } ?>
</body>
</html>
