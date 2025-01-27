<?php

use Laminas\Mvc\Application;
use Laminas\Stdlib\ArrayUtils;
use Laminas\ServiceManager\ServiceManager;
use Laminas\Mvc\Factory\ApplicationFactory;

// Activa el modo de depuración temporalmente
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Verifica si el archivo application.config.php existe
$configFile = __DIR__ . '/application.config.php';
if (!file_exists($configFile)) {
    die('Error: application.config.php no encontrado.');
}

// Carga la configuración
$appConfig = require $configFile;
if (file_exists(__DIR__ . '/development.config.php')) {
    $devConfig = require __DIR__ . '/development.config.php';
    $appConfig = ArrayUtils::merge($appConfig, $devConfig);
}

// Verifica si la clave de dependencias existe
if (!isset($appConfig['dependencies'])) {
    $appConfig['dependencies'] = []; // Asegúrate de que exista
}

// Añadir el servicio de la aplicación al contenedor
$appConfig['dependencies']['factories'][Application::class] = ApplicationFactory::class;

// Inicia el contenedor de servicios
$serviceManager = new ServiceManager([
    'factories' => [
        Application::class => ApplicationFactory::class, // Fábrica para la clase Application
    ]
]);

// Devuelve el contenedor de servicios
return $serviceManager;
