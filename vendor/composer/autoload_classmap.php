<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'Modules\\Contact\\Database\\Seeders\\ContactDatabaseSeeder' => $baseDir . '/Database/Seeders/ContactDatabaseSeeder.php',
    'Modules\\Contact\\Entities\\Contact' => $baseDir . '/Entities/Contact.php',
    'Modules\\Contact\\Entities\\ContactTranslation' => $baseDir . '/Entities/ContactTranslation.php',
    'Modules\\Contact\\Http\\Controllers\\Admin\\ContactController' => $baseDir . '/Http/Controllers/Admin/ContactController.php',
    'Modules\\Contact\\Http\\Controllers\\ContactController' => $baseDir . '/Http/Controllers/ContactController.php',
    'Modules\\Contact\\Providers\\ContactServiceProvider' => $baseDir . '/Providers/ContactServiceProvider.php',
    'Modules\\Contact\\Providers\\RouteServiceProvider' => $baseDir . '/Providers/RouteServiceProvider.php',
    'Modules\\Contact\\Repositories\\Cache\\CacheContactDecorator' => $baseDir . '/Repositories/Cache/CacheContactDecorator.php',
    'Modules\\Contact\\Repositories\\ContactRepository' => $baseDir . '/Repositories/ContactRepository.php',
    'Modules\\Contact\\Repositories\\Eloquent\\EloquentContactRepository' => $baseDir . '/Repositories/Eloquent/EloquentContactRepository.php',
    'Modules\\Contact\\Sidebar\\SidebarExtender' => $baseDir . '/Sidebar/SidebarExtender.php',
);
