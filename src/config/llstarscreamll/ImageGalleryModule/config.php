<?php

/**
 * Este archivo es parte de ImageGalleryModule de llstarscreamll, guarda la información
 * de parámetros de configuración del módulo, para que este módulo funcione, es necesario
 * instalar el CoreModule.
 *
 * @license MIT
 * @package llstarscreamll\ImageGalleryModule
 */

return [
    'module-info'    =>    [
        'name'        =>    'ImageGalleryModule',
        'version'    =>    '0.1',
        'enabled'    =>    true,
    ],

    'module-config'    =>    [
        'images_store_path'    =>    '/uploads/img/ImageGalleryModule/'
    ]
];
