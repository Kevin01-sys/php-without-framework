<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Lista de Usuarios</title>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Nombres</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Creación</th>
                    <th>Modificación</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['nombre']; ?></td>
                    <td><?php echo $user['hobby']; ?></td>
                    <td><?php echo $user['estado']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>