<!DOCTYPE html>
<html lang="en">

<head>
    <title>Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    // Te recomiendo utilizar esta conección, la que utilizas ya no es la recomendada. 
    $link = new PDO('mysql:host=162.241.62.191;dbname=tecnoso5_cocleavirtual', 'tecnoso5_master', 'nKwuIMe#Nj*8'); // el campo vaciío es para la password. 

    ?>

    <table class="table table-striped">

        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Contrasena</th>
                <th>Tipo Usuario</th>
                <th>Fecha de Inserción</th>

            </tr>
        </thead>
        <?php foreach ($link->query('SELECT * from Cuenta') as $row) { // aca puedes hacer la consulta e iterarla con each. 
        ?>
            <tr>
                <td><?php echo $row['idCuenta'] // aca te faltaba poner los echo para que se muestre el valor de la variable.  
                    ?></td>
                <td><?php echo $row['nombre'] ?></td>
                <td><?php echo $row['correo'] ?></td>
                <td><?php echo $row['contrasena'] ?></td>
                <td><?php echo $row['tipoUsuario'] ?></td>
                <td><?php echo $row['fecha'] ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>