<?php
    $config = parse_ini_file( dirname(__FILE__) . '\questions.ini');
    return array(
        'driver' => $config['diver'],
        'host' => $config['host'],
        'user' => $config['user'],
        'pass' => $config['pass'],
        'database' => $config['db'],
        'chartset' => $config['charset']
    );
?>