<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Backend de QR Code
    |--------------------------------------------------------------------------
    |
    | Aquí puedes especificar el backend que deseas utilizar para generar los códigos QR.
    | 'GD' es el backend predeterminado que utiliza la librería GD.
    | 'Imagick' puede ser usado si tienes la extensión de Imagick instalada.
    |
    */

    'back_end' => 'GD', // Usar GD como backend para la generación de QR

    /*
    |--------------------------------------------------------------------------
    | Otras configuraciones
    |--------------------------------------------------------------------------
    |
    | Aquí puedes agregar configuraciones adicionales como tamaño, color, etc.
    |
    */

    'size' => 500, // Tamaño del QR
    'margin' => 2, // Margen
    'encoding' => 'UTF-8', // Codificación
    'error_correction_level' => 'L', // Nivel de corrección de errores
    'foreground_color' => [255, 0, 0], // Rojo
    'background_color' => [0, 0, 0], // Fondo negro
];
