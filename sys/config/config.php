<?php

    require $_SERVER['DOCUMENT_ROOT'] . '/sys/vendor/autoload.php';
    $dotenv = new Dotenv\Dotenv($_SERVER['DOCUMENT_ROOT']);
    $dotenv->load();

    // switch($_SERVER['SERVER_NAME']) {
    //
    //     case 'oneteamgov':
    //         include(__DIR__.'/config.oneteamgov.php');
    //         break;
    //
    //     default:
    //         include('config.production.php');
    //         break;
    // }

    define('PERCH_SITEPATH', getenv('PERCH_SITEPATH'));
  	define('PERCH_SCHEDULE_SECRET', getenv('PERCH_SITEPATH'));

    // database config
  	define('PERCH_DB_USERNAME', getenv('PERCH_DB_USERNAME'));
  	define('PERCH_DB_PASSWORD', getenv('PERCH_DB_PASSWORD'));
  	define('PERCH_DB_SERVER', 	getenv('PERCH_DB_SERVER'));
  	define('PERCH_DB_DATABASE', getenv('PERCH_DB_DATABASE'));
  	define('PERCH_DB_PREFIX', 	getenv('PERCH_DB_PREFIX'));

    define('PERCH_LICENSE_KEY', getenv('PERCH_LICENSE_KEY'));
    define('PERCH_EMAIL_FROM', getenv('PERCH_EMAIL_FROM'));
    define('PERCH_EMAIL_FROM_NAME', getenv('PERCH_EMAIL_FROM_NAME'));

    define('PERCH_LOGINPATH', '/sys');
    define('PERCH_PATH', str_replace(DIRECTORY_SEPARATOR.'config', '', __DIR__));
    define('PERCH_CORE', PERCH_PATH.DIRECTORY_SEPARATOR.'core');

    define('PERCH_RESFILEPATH', PERCH_PATH . DIRECTORY_SEPARATOR . 'resources');
    define('PERCH_RESPATH', PERCH_LOGINPATH . '/resources');

    define('PERCH_HTML5', true);
    define('PERCH_TZ', 'UTC');
    // define('PERCH_SITE_BEHIND_LOGIN', getenv('PERCH_SITE_BEHIND_LOGIN'));
    define('PERCH_DEBUG', getenv('PERCH_DEBUG'));
