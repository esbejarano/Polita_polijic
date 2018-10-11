<?php
    $config = parse_ini_file('./questions.ini');
    return array(
        'driver' => $config['diver'],
        'host' => $config['host'],
        'user' => $config['user'],
        'pass' => $config['pass'],
        'database' => $config['db'],
        'chartset' => $config['chartset']
    );
?>