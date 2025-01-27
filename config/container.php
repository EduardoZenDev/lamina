<?php

use Laminas\Mvc\Application;
use Laminas\Stdlib\ArrayUtils;

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
    die('Error: La configuración no contiene la clave "dependencies".');
}

// Inicia la aplicación
try {
    return Application::init($appConfig)->getServiceManager();
} catch (\Throwable $e) {
    die('Error en la inicialización: ' . $e->getMessage());
}
