<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8404798d56a052aaed4dbf27182d1a48
{
    public static $prefixesPsr0 = array (
        'O' => 
        array (
            'Openpay' => 
            array (
                0 => __DIR__ . '/..' . '/openpay/sdk',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit8404798d56a052aaed4dbf27182d1a48::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
