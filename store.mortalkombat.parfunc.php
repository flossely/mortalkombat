<?php

$proUseWeapon = shopFor('.', 'melee');
$subUseWeapon = shopFor($sub, 'melee');
$objUseWeapon = shopFor($obj, 'melee');

if ($proUseWeapon !== null) {
    $proForce = $proUseWeapon['damage'];
} else {
    $proForce = 1;
}
if ($subUseWeapon !== null) {
    $subForce = $subUseWeapon['damage'];
} else {
    $subForce = 1;
}
if ($objUseWeapon !== null) {
    $objForce = $objUseWeapon['damage'];
} else {
    $objForce = 1;
}

$proUseCombo = shopFor('.', 'combo');
$subUseCombo = shopFor($sub, 'combo');
$objUseCombo = shopFor($obj, 'combo');

if ($proUseCombo !== null) {
    $proForce = $proUseCombo['damage'];
} else {
    $proForce = 1;
}
if ($subUseCombo !== null) {
    $subForce = $subUseCombo['damage'];
} else {
    $subForce = 1;
}
if ($objUseCombo !== null) {
    $objForce = $objUseCombo['damage'];
} else {
    $objForce = 1;
}
