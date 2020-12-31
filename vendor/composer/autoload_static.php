<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit88d6de5bf68b5e473b864a4ac3961a1c
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        't' => 
        array (
            'toy\\' => 4,
        ),
        'T' => 
        array (
            'Twig\\' => 5,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Polyfill\\Ctype\\' => 23,
        ),
        'M' => 
        array (
            'Mvc\\' => 4,
        ),
        'C' => 
        array (
            'Core\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'toy\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
        'Twig\\' => 
        array (
            0 => __DIR__ . '/..' . '/twig/twig/src',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'Mvc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Mvc',
        ),
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Core',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit88d6de5bf68b5e473b864a4ac3961a1c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit88d6de5bf68b5e473b864a4ac3961a1c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit88d6de5bf68b5e473b864a4ac3961a1c::$classMap;

        }, null, ClassLoader::class);
    }
}
