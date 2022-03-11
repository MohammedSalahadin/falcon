<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit75e12315a7cd55f1fdd4ca0472deaf5e
{
    public static $files = array (
        '3109cb1a231dcd04bee1f9f620d46975' => __DIR__ . '/..' . '/paragonie/sodium_compat/autoload.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twilio\\' => 7,
            'Telnyx\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/src/Twilio',
        ),
        'Telnyx\\' => 
        array (
            0 => __DIR__ . '/..' . '/telnyx/telnyx-php/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit75e12315a7cd55f1fdd4ca0472deaf5e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit75e12315a7cd55f1fdd4ca0472deaf5e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit75e12315a7cd55f1fdd4ca0472deaf5e::$classMap;

        }, null, ClassLoader::class);
    }
}