<?php

if (file_exists('paradigm')) {
    $paradigm = file_get_contents('paradigm');
} else {
    $paradigm = 'default';
}
$paradigmFile = file_get_contents($paradigm.'.par');
$paradigmArr = explode('|[1]|', $paradigmFile);
$paradigmData = [];
foreach ($paradigmArr as $key=>$value) {
    $paradigmExp = explode('|[>]|', $value);
    $paradigmElemProp = $paradigmExp[0];
    $paradigmElemVal = $paradigmExp[1];
    $paradigmData[$paradigmElemProp] = $paradigmElemVal;
}

if (file_exists('year')) {
    $today = file_get_contents('year');
} else {
    $today = $paradigmData['default_year'];
}

$chars = [];

$add = $_REQUEST['id'];
$dataString = $_REQUEST['data'];

$dataParse = explode('|[1]|', $dataString);
$metadata = [];
foreach ($dataParse as $key=>$value) {
    $dataExp = explode('|[>]|', $value);
    $dataProp = $dataExp[0];
    $dataValue = $dataExp[1];
    $metadata[$dataProp] = $dataValue;
}

$var = $metadata['var'];

if (file_exists($add.'-mk')) {
    chmod($add.'-mk', 0777);
    rename($add.'-mk', $add.'-mk.d');
}
exec('git clone https://github.com/mortalhub/'.$add.'-mk');
chmod($add.'-mk', 0777);
copy('./'.$add.'-mk/'.$add.'.mk.php', './'.$add.'.mk.php');
exec('chmod -R 777 .');
exec('rm -rf '.$add.'-mk');
if (file_exists($add.'-mk.d')) {
    chmod($add.'-mk.d', 0777);
    rename($add.'-mk.d', $add.'-mk');
}

include $add.'.mk.php';

if (!array_key_exists($var, $chars[$add]['var'])) {
    $var = array_key_first($chars[$add]['var']);
}

if (!file_exists($add)) {
    mkdir($add);
    chmod($add, 0777);
}

if (!file_exists($add.'/coord')) {
    file_put_contents($add.'/coord', $paradigmData['default_coord']);
    chmod($add.'/coord', 0777);
}
if (!file_exists($add.'/rating')) {
    file_put_contents($add.'/rating', $paradigmData['default_rating']);
    chmod($add.'/rating', 0777);
}
if (!file_exists($add.'/mode')) {
    file_put_contents($add.'/mode', $paradigmData['default_mode']);
    chmod($add.'/mode', 0777);
}
if (!file_exists($add.'/score')) {
    file_put_contents($add.'/score', $paradigmData['default_score']);
    chmod($add.'/score', 0777);
}
if (!file_exists($add.'/money')) {
    file_put_contents($add.'/money', $paradigmData['default_money']);
    chmod($add.'/money', 0777);
}
if (!file_exists($add.'/born')) {
    file_put_contents($add.'/born', $today);
    chmod($add.'/born', 0777);
}

file_put_contents($add.'/name', $chars[$add]['var'][$var]['name']);
chmod($add.'/name', 0777);
