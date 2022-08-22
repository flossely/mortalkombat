<?php

include 'basefunc.php';
include 'dataload.php';

$chars = [];
$add = $_REQUEST['id'];

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

file_put_contents($add.'/name', $chars[$add]['var'][$lingua]['name']);
chmod($add.'/name', 0777);
file_put_contents($add.'/faction', $chars[$add]['var'][$lingua]['faction']);
chmod($add.'/faction', 0777);
file_put_contents($add.'/locale', $lingua);
chmod($add.'/locale', 0777);

$addFactionID = $chars[$add]['faction'];

if (file_exists('logos')) {
    chmod('logos', 0777);
    rename('logos', 'logos.d');
}
exec('git clone -b mortalkombat https://github.com/wholemarket/logos');
chmod('logos', 0777);
copy('./logos/faction.'.$addFactionID.'.png', './'.$add.'/favicon.png');
exec('chmod -R 777 .');
exec('rm -rf logos');
if (file_exists('logos.d')) {
    chmod('logos.d', 0777);
    rename('logos.d', 'logos');
}
