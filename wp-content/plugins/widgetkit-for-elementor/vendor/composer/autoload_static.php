<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdbd63537e3f5e065783e819e462d35f3
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Appsero\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Appsero\\' => 
        array (
            0 => __DIR__ . '/..' . '/appsero/client/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'Parsedown' => 
            array (
                0 => __DIR__ . '/..' . '/erusev/parsedown',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdbd63537e3f5e065783e819e462d35f3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdbd63537e3f5e065783e819e462d35f3::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitdbd63537e3f5e065783e819e462d35f3::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
