<?php

/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return [
    // ... 'db' => [
    // ...    'driver'   => 'Pdo',
    // ...    'dsn'      => 'mysql:dbname=tu_base_de_datos;host=localhost;charset=utf8',
    // ...    'username' => 'tu_usuario',
    // ...    'password' => 'tu_contraseña',
    // ...],
    'dependencies' => [
        'factories' => [
            Laminas\Mvc\Application::class => Laminas\Mvc\Service\ApplicationFactory::class,
        ],
    ],
];
