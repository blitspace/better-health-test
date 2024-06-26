<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7c3ddb43a120517411799e0369b52d76
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'BetterHealth\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'BetterHealth\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7c3ddb43a120517411799e0369b52d76::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7c3ddb43a120517411799e0369b52d76::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7c3ddb43a120517411799e0369b52d76::$classMap;

        }, null, ClassLoader::class);
    }
}
