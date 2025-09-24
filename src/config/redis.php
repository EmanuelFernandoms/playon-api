<?php

ini_set('session.auto_start', 0);

if (getenv('DOCKER_CONTAINER')) {

    $env = (defined('APP_ENV')) ? APP_ENV : 'local';

    ini_set('session.save_handler', 'redis');
    ini_set('session.save_path', 'tcp://redis:6379');
    ini_set('session.gc_maxlifetime', 86400);  // 24 horas
    ini_set('session.cookie_lifetime', 86400);
    ini_set('session.cache_expire', 1440); // em minutos, alinhar

    switch ($env) {
        case 'qa':
            ini_set('session.name', 'QASESSID');
            break;
        case 'prd':
        case 'production':
        case 'prod':
            ini_set('session.name', 'PRODSESSID');
            break;
        default:
            ini_set('session.name', 'LOCALSESSID');
            break;
    }
}
