<?php

    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    $dotenv = new Dotenv\Dotenv($_SERVER['DOCUMENT_ROOT']);
    $dotenv->load();

    switch($_SERVER['SERVER_NAME']) {

        case 'oneteamgov':
            include(__DIR__.'/config.oneteamgov.php');
            break;

        default:
            include('config.production.php');
            break;
    }

    define('PERCH_LICENSE_KEY', getenv('PERCH_LICENSE_KEY'));
    define('PERCH_EMAIL_FROM', 'mail@paulsmith.site');
    define('PERCH_EMAIL_FROM_NAME', 'Paul Smith');

    define('PERCH_LOGINPATH', '/sys');
    define('PERCH_PATH', str_replace(DIRECTORY_SEPARATOR.'config', '', __DIR__));
    define('PERCH_CORE', PERCH_PATH.DIRECTORY_SEPARATOR.'core');

    define('PERCH_RESFILEPATH', PERCH_PATH . DIRECTORY_SEPARATOR . 'resources');
    define('PERCH_RESPATH', PERCH_LOGINPATH . '/resources');

    define('PERCH_HTML5', true);
    define('PERCH_TZ', 'UTC');
