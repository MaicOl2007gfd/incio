 <?php
session_start();
include("conexion.php");

$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
$success = $_SESSION['success'] ?? '';

unset($_SESSION['errors'], $_SESSION['old'], $_SESSION['success']);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registro de Usuario</title>
</head>
<body>
    <div class="login-container">
        <?php if ($success): ?>
            <div class="message-success"><strong><?php echo htmlspecialchars($success, 'UTF-8'); ?></strong></div>
        <?php endif; ?>

        <div class="login-card">
            <div class="card-header">
                <h1>Registrar Usuario</h1>
            </div>

            <form action="validaciones.php" method="post" novalidate class="form-content">
                <div class="form-group">
                    <label for="Nombre" class="form-label">Nombre de usuario</label>
                    <input type="text" name="Nombre" id="Nombre" class="form-control" placeholder="Ingrese su nombre de usuario" value="<?php echo htmlspecialchars($old['Nombre'] ?? ''); ?>">
                    <?php if (isset($errors['Nombre'])): ?>
                        <div class="message-error"><?php echo htmlspecialchars($errors['Nombre']); ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="Email" class="form-label">Correo electrónico</label>
                    <input type="email" name="Email" id="Email" class="form-control" placeholder="Ingrese su correo" value="<?php echo htmlspecialchars($old['Email'] ?? ''); ?>">
                    <?php if (isset($errors['Email'])): ?>
                        <div class="message-error"><?php echo htmlspecialchars($errors['Email']); ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="Contraseña1" class="form-label">Contraseña</label>
                    <input type="password" name="Contraseña1" id="Contraseña1" class="form-control" placeholder="Ingrese su contraseña">
                    <?php if (isset($errors['Contraseña1'])): ?>
                        <div class="message-error"><?php echo htmlspecialchars($errors['Contraseña1']); ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="Contraseña2" class="form-label">Confirmar contraseña</label>
                    <input type="password" name="Contraseña2" id="Contraseña2" class="form-control" placeholder="Confirme su contraseña">
                    <?php if (isset($errors['Contraseña2'])): ?>
                        <div class="message-error"><?php echo htmlspecialchars($errors['Contraseña2']); ?></div>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn-primary">Registrarse</button>
            </form>

            
        </div>
    </div>
</body>
</html>
