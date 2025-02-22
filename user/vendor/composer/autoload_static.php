<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit597ccc9108170ac3728e31abe81dc640
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'Ghostff\\Session\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Ghostff\\Session\\' => 
        array (
            0 => __DIR__ . '/..' . '/ghostff/session/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit597ccc9108170ac3728e31abe81dc640::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit597ccc9108170ac3728e31abe81dc640::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit597ccc9108170ac3728e31abe81dc640::$classMap;

        }, null, ClassLoader::class);
    }
}
