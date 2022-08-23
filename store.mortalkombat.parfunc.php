<?php

$proUseMelee = shopFor('.', 'melee');
$subUseMelee = shopFor($sub, 'melee');
$objUseMelee = shopFor($obj, 'melee');

if ($proUseMelee !== null) {
    $proForceType = $proUseMelee['name'];
    $proForce = $proUseMelee['damage'];
} else {
    $proForceType = 'melee';
    $proForce = 1;
}
if ($subUseMelee !== null) {
    $subForceType = $subUseMelee['name'];
    $subForce = $subUseMelee['damage'];
} else {
    $subForceType = 'melee';
    $subForce = 1;
}
if ($objUseMelee !== null) {
    $objForceType = $objUseMelee['name'];
    $objForce = $objUseMelee['damage'];
} else {
    $objForceType = 'melee';
    $objForce = 1;
}

$proUseCombo = shopFor('.', 'combo');
$subUseCombo = shopFor($sub, 'combo');
$objUseCombo = shopFor($obj, 'combo');
