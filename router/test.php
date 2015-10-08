<?php

foreach (array(
    'WEB_ENV_DEBIAN_FRONTEND' => 'dialog',
    'WEB_PORT_9001_TCP' => 'tcp://172.17.0.1:9001',
    'WEB_PORT' => 'tcp://172.17.0.1:22',
    'WEB_PORT_22_TCP_ADDR' => '172.17.0.1',
    'WEB_NAME' => '/lonely_lovelace/web',
    'WEB_PORT_22_TCP_PORT' => '22',
    'WEB_PORT_22_TCP_PROTO' => 'tcp',
    'WEB_PORT_80_TCP_ADDR' => '172.17.0.1',
    'WEB_PORT_80_TCP_PORT' => '80',
    'WEB_PORT_80_TCP_PROTO' => 'tcp',
    'WEB_ENV_affinity:container' => '=0c24c0354158da4fffaee5aadc6bc73014caff5c8dee7da2c1fbae830086d9f4',
    'WEB_PORT_22_TCP' => 'tcp://172.17.0.1:22',
    'WEB_PORT_80_TCP' => 'tcp://172.17.0.1:80',
    'WEB_PORT_9001_TCP_ADDR' => '172.17.0.1',
    'WEB_PORT_9001_TCP_PORT' => '9001',
    'WEB_PORT_9001_TCP_PROTO' => 'tcp',
    'FORWARD' => array('80:web:80', '9001:web:9001'),
         ) as $name => $value) {
    $_SERVER[$name] = $value;
}

require 'configure.php';

