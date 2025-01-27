<?php

/**
 * If you need an environment-specific system or application configuration,
 * there is an example in the documentation
 *
 * @see https://docs.laminas.dev/tutorials/advanced-config/#environment-specific-system-configuration
 * @see https://docs.laminas.dev/tutorials/advanced-config/#environment-specific-application-configuration
 */

 return [
    // Lista de módulos utilizados en la aplicación
    'modules' => [
        'Laminas\Router',        // Para enrutamiento
        'Laminas\Validator',     // Para validadores
        'Application',           // Tu módulo de aplicación
    ],

    // Opciones del listener del módulo
    'module_listener_options' => [
        // Archivos de configuración que se cargarán desde rutas glob
        'config_glob_paths' => [
            realpath(__DIR__) . '/autoload/{{,*.}global,{,*.}local}.php', // Ruta de configuración global/local
        ],

        // Rutas donde buscará los módulos
        'module_paths' => [
            './module',  // Directorio de tus módulos personalizados
            './vendor',  // Directorio de los módulos de Composer
        ],
    ],

    // Dependencias de la aplicación (añadir esta parte)
    'dependencies' => [
        'invokables' => [
            // Aquí puedes agregar tus servicios invocables
            // Ejemplo: 'Application\Controller\IndexController' => 'Application\Controller\IndexController'
        ],
        'factories' => [
            Laminas\Mvc\Application::class => Laminas\Mvc\Factory\ApplicationFactory::class,
        ],
    ],
];

