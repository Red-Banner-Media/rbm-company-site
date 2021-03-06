<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1afed20e80a9c96e41087ae4b4457a98
{
    public static $files = array (
        '3f8bdd3b35094c73a26f0106e3c0f8b2' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/SendGrid.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'SendGrid\\Stats\\' => 15,
            'SendGrid\\Mail\\' => 14,
            'SendGrid\\Contacts\\' => 18,
            'SendGrid\\' => 9,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'N' => 
        array (
            'Neoan3\\Apps\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'SendGrid\\Stats\\' => 
        array (
            0 => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/stats',
        ),
        'SendGrid\\Mail\\' => 
        array (
            0 => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail',
        ),
        'SendGrid\\Contacts\\' => 
        array (
            0 => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/contacts',
        ),
        'SendGrid\\' => 
        array (
            0 => __DIR__ . '/..' . '/sendgrid/php-http-client/lib',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Neoan3\\Apps\\' => 
        array (
            0 => __DIR__ . '/..' . '/neoan3-apps/db',
            1 => __DIR__ . '/..' . '/neoan3-apps/hcaptcha',
            2 => __DIR__ . '/..' . '/neoan3-apps/template',
            3 => __DIR__ . '/..' . '/neoan3-apps/transformer',
        ),
    );

    public static $prefixesPsr0 = array (
        'C' => 
        array (
            'Composer\\CustomDirectoryInstaller' => 
            array (
                0 => __DIR__ . '/..' . '/mnsami/composer-custom-directory-installer/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1afed20e80a9c96e41087ae4b4457a98::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1afed20e80a9c96e41087ae4b4457a98::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit1afed20e80a9c96e41087ae4b4457a98::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
