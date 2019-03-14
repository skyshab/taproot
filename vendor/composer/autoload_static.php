<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita84c678bf0db3534d7ef20ff0d50134a
{
    public static $files = array (
        '77c7b76f4dcd3556a40cd339441c5cce' => __DIR__ . '/..' . '/justintadlock/hybrid-core/src/bootstrap-hybrid.php',
        'b03984ffdb4c6b9d816ecda51bb2d015' => __DIR__ . '/..' . '/skyshab/rootstrap/src/rootstrap-init.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Taproot\\' => 8,
        ),
        'R' => 
        array (
            'Rootstrap\\' => 10,
        ),
        'H' => 
        array (
            'Hybrid\\Carbon\\' => 14,
            'Hybrid\\Breadcrumbs\\' => 19,
            'Hybrid\\' => 7,
        ),
        'D' => 
        array (
            'Dealerdirect\\Composer\\Plugin\\Installers\\PHPCodeSniffer\\' => 55,
        ),
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Taproot\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'Rootstrap\\' => 
        array (
            0 => __DIR__ . '/..' . '/skyshab/rootstrap/src',
        ),
        'Hybrid\\Carbon\\' => 
        array (
            0 => __DIR__ . '/..' . '/justintadlock/hybrid-carbon/src',
        ),
        'Hybrid\\Breadcrumbs\\' => 
        array (
            0 => __DIR__ . '/..' . '/justintadlock/hybrid-breadcrumbs/src',
        ),
        'Hybrid\\' => 
        array (
            0 => __DIR__ . '/..' . '/justintadlock/hybrid-core/src',
        ),
        'Dealerdirect\\Composer\\Plugin\\Installers\\PHPCodeSniffer\\' => 
        array (
            0 => __DIR__ . '/..' . '/dealerdirect/phpcodesniffer-composer-installer/src',
        ),
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita84c678bf0db3534d7ef20ff0d50134a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita84c678bf0db3534d7ef20ff0d50134a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
