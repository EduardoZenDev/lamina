<?php
declare(strict_types=1);

use Laminas\Mvc\Application;

error_reporting(E_ALL);
ini_set('display_errors', '1');

// Cambiar la raíz del proyecto
chdir(dirname(__DIR__));

// Decline static file requests back to the PHP built-in webserver
if (php_sapi_name() === 'cli-server') {
    $path = realpath(__DIR__ . parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH));
    if ($path && __FILE__ !== $path && is_file($path)) {
        return false;
    }
    unset($path);
}

// Composer autoloading (ahora fuera de public_html)
$autoloadPath = __DIR__ . '/../vendor/autoload.php';
if (!file_exists($autoloadPath)) {
    die("Error: No se encontró 'vendor/autoload.php'. Ejecuta 'composer install'.");
}
include $autoloadPath;

// Cargar el contenedor de dependencias
$containerPath = __DIR__ . '/../config/container.php';
if (!file_exists($containerPath)) {
    die("Error: No se encontró 'config/container.php'. Verifica la estructura de archivos.");
}

$container = require $containerPath;

/** @var Application $app */
$app = $container->get(Application::class);
$app->run();
