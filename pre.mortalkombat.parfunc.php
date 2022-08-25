<?php

$proUseItem = shopFor('.', 'item');
$subUseItem = shopFor($sub, 'item');
$objUseItem = shopFor($obj, 'item');

if (file_exists($sub.'/punch.force')) {
    $subPunchForce = file_get_contents($sub.'/punch.force');
} else {
    $subPunchForce = 1;
}
if (file_exists($sub.'/kick.force')) {
    $subKickForce = file_get_contents($sub.'/kick.force');
} else {
    $subKickForce = 2;
}
if (file_exists($sub.'/grapple.force')) {
    $subGrappleForce = file_get_contents($sub.'/grapple.force');
} else {
    $subGrappleForce = 5;
}

$proUseWeapon = shopFor('.', 'weapon');
$subUseWeapon = shopFor($sub, 'weapon');
$objUseWeapon = shopFor($obj, 'weapon');

if ($proUseWeapon !== null) {
    $proForceType = $proUseWeapon['name'];
    $proForce = $proUseWeapon['damage'];
} else {
    $proForceType = 'melee';
    $proForce = 1;
}
if ($subUseWeapon !== null) {
    $subForceType = $subUseWeapon['name'];
    $subForce = $subUseWeapon['damage'];
} else {
    $subForceType = 'melee';
    $subForce = 1;
}
if ($objUseWeapon !== null) {
    $objForceType = $objUseWeapon['name'];
    $objForce = $objUseWeapon['damage'];
} else {
    $objForceType = 'melee';
    $objForce = 1;
}

$proUseMelee = shopFor('.', 'melee');
$subUseMelee = shopFor($sub, 'melee');
$objUseMelee = shopFor($obj, 'melee');

if ($proUseMelee !== null) {
    $proMeleeType = $proUseMelee['name'];
    $proMeleeForce = $proUseMelee['damage'];
} else {
    $proMeleeType = 'melee';
    $proMeleeForce = 1;
}
if ($subUseMelee !== null) {
    $subMeleeType = $subUseMelee['name'];
    $subMeleeForce = $subUseMelee['damage'];
} else {
    $subMeleeType = 'melee';
    $subMeleeForce = 1;
}
if ($objUseMelee !== null) {
    $objMeleeType = $objUseMelee['name'];
    $objMeleeForce = $objUseMelee['damage'];
} else {
    $objMeleeType = 'melee';
    $objMeleeForce = 1;
}
