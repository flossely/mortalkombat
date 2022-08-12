<?php

// GETTING CURRENT YEAR FROM FILE
if (file_exists('year')) {
    $today = file_get_contents('year');
} else {
    $today = -2000;
}

// CREATING CHARACTERS ARRAY
$chars = [];

// GETTING DATA FROM HTTP REQUEST
$add = $_REQUEST['id'];
$var = $_REQUEST['var'];

// GETTING CHARACTER DATA
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

// INCLUDE DATA FROM DOWNLOADED FILE
include $add.'.mk.php';

// OVERRIDE VARIATION VALUE IF A GIVEN ONE IS NOT EXISTING
if (!array_key_exists($var, $chars[$add]['var'])) {
    $var = array_key_first($chars[$add]['var']);
}

// CREATE OBJECT DIRECTORY IF NOT EXISTING
if (!file_exists($add)) {
    mkdir($add);
    chmod($add, 0777);
}

// THOSE FILES ONCE CREATED IN TARGET DIRECTORY WILL NOT BE OVERRIDDEN
if (!file_exists($add.'/coord')) {
    file_put_contents($add.'/coord', '0;0;0');
    chmod($add.'/coord', 0777);
}
if (!file_exists($add.'/rating')) {
    file_put_contents($add.'/rating', 1000);
    chmod($add.'/rating', 0777);
}
if (!file_exists($add.'/mode')) {
    file_put_contents($add.'/mode', 0);
    chmod($add.'/mode', 0777);
}
if (!file_exists($add.'/score')) {
    file_put_contents($add.'/score', 0);
    chmod($add.'/score', 0777);
}
if (!file_exists($add.'/money')) {
    file_put_contents($add.'/money', 0);
    chmod($add.'/money', 0777);
}
if (!file_exists($add.'/born')) {
    file_put_contents($add.'/born', $today);
    chmod($add.'/born', 0777);
}

// CREATING PARADIGM-RELATED DATA
file_put_contents($add.'/name', $chars[$add]['var'][$var]['name']);
chmod($add.'/name', 0777);
