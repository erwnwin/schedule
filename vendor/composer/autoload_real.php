<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitdcd6ab97da17b0caec5d46f52abd3e35
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitdcd6ab97da17b0caec5d46f52abd3e35', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitdcd6ab97da17b0caec5d46f52abd3e35', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitdcd6ab97da17b0caec5d46f52abd3e35::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
