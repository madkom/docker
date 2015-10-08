#!/usr/bin/env php
<?php

if (false === array_key_exists('FORWARD', $_SERVER) || 0 === sizeof($_SERVER['FORWARD'])) {
    error('Missing FORWARD environment', 1);
}
$ip = preg_replace('/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+).*/', '\\1', exec('hostname -i'));
$links = links();
foreach (rules() as $port => $rule) {
    if (false === array_key_exists($rule['service'], $links)) {
        error("Missing service name: ${rule['service']}", 2);
    }
    printf("${ip} ${port} %s %d\n", $links[$rule['service']][$rule['dst']]['addr'], $links[$rule['service']][$rule['dst']]['port']);
}
if (array_key_exists('LOGFILE', $_SERVER) && is_string($_SERVER['LOGFILE']) && strlen($_SERVER['LOGFILE']) > 0) {
    echo "logfile ${_SERVER['LOGFILE']}\nlogcommon\n";
}

function error($msg, $code = 1) {
    @file_put_contents('/dev/stderr', sprintf("\033[0;31mConfiguration error: %s\033[0m\n", $msg));
    exit(intval($code));
}
function rules() {
    $rules = array();
    foreach ($_SERVER['FORWARD'] as $rule) {
        if (preg_match('/^(?<src>[0-9]+):(?<service>[^\:]+):(?<dst>[0-9]+)$/', $rule, $match)) {
            $rules[$match['src']] = $match;
        }
    }
    return $rules;
}
function links() {
    $links = array();
    $names = array();
    foreach ($_SERVER as $key => $value) {
        if (preg_match('/^(?<id>[0-9a-zA-Z\_]+)_NAME$/', $key, $match) && ($name = preg_replace('/^\/.*\/(?<name>[0-9a-zA-Z\_]+)$/', '\\1', $value))) {
            $names[$match['id']] = $name;
        }
    }
    foreach ($_SERVER as $key => $value) {
        if (preg_match('/^(?<id>[a-zA-Z0-9\_]+)_PORT_(?<port>[0-9]+)_TCP_(?<config>[a-zA-Z0-9\_]+)$/', $key, $match) && array_key_exists($match['id'], $names)) {
            $links[$names[$match['id']]][$match['port']][strtolower($match['config'])] = $value;
        }
    }
    return $links;
}
