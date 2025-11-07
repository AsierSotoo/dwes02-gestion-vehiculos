<?php
// Autoloader PSR-4 mínimo (sustituto del de Composer).
spl_autoload_register(function ($class) {
    $map = [
        'App\\' => __DIR__ . '/../src/',
    ];
    foreach ($map as $prefix => $baseDir) {
        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0) continue;
        $relative = substr($class, $len);
        $file = $baseDir . str_replace('\\', '/', $relative) . '.php';
        if (file_exists($file)) { require $file; }
    }
});
return true;
