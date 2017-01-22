<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2d5a147eb4c488f4fecc94f84113b7ac
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Tau\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Tau\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Tau',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2d5a147eb4c488f4fecc94f84113b7ac::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2d5a147eb4c488f4fecc94f84113b7ac::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
