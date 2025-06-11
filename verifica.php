<?php
$contraseñaIngresada = 'admin1234';  // Esto cambia por la contraseña real después de poner en el registro
$hashEnBD = '$2y$10$CitqEtkkkhOkbZM9K8Tdr.lKdS9M6KTdxJqNnJu7qFi02sub5n3uu';

if (password_verify($contraseñaIngresada, $hashEnBD)) {
    echo "Contraseña válida. Puedes hacer login.";
} else {
    echo "Contraseña incorrecta.";
}
