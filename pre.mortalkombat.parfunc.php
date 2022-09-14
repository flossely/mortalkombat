<?php

$proUseMove = shopFor('.', 'move');
$subUseMove = shopFor($sub, 'move');
$objUseMove = shopFor($obj, 'move');

if ($proUseMove !== null) {
    $proMoveType = $proUseMove['name'];
    $proMoveForce = $proUseMove['damage'];
} else {
    $proMoveType = 'hit';
    $proMoveForce = 1;
}
if ($subUseMove !== null) {
    $subMoveType = $subUseMove['name'];
    $subMoveForce = $subUseMove['damage'];
} else {
    $subMoveType = 'hit';
    $subMoveForce = 1;
}
if ($objUseMove !== null) {
    $objMoveType = $objUseMove['name'];
    $objMoveForce = $objUseMove['damage'];
} else {
    $objMoveType = 'hit';
    $objMoveForce = 1;
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
    $proMeleeType = 'hit';
    $proMeleeForce = 1;
}
if ($subUseMelee !== null) {
    $subMeleeType = $subUseMelee['name'];
    $subMeleeForce = $subUseMelee['damage'];
} else {
    $subMeleeType = 'hit';
    $subMeleeForce = 1;
}
if ($objUseMelee !== null) {
    $objMeleeType = $objUseMelee['name'];
    $objMeleeForce = $objUseMelee['damage'];
} else {
    $objMeleeType = 'hit';
    $objMeleeForce = 1;
}

$proUseShield = shopFor('.', 'shield');
$subUseShield = shopFor($sub, 'shield');
$objUseShield = shopFor($obj, 'shield');

if ($proUseShield !== null) {
    $proShieldType = $proUseShield['name'];
    $proShield = $proUseShield['defense'];
} else {
    $proShieldType = 'none';
    $proShield = 0;
}
if ($subUseShield !== null) {
    $subShieldType = $subUseShield['name'];
    $subShield = $subUseShield['defense'];
} else {
    $subShieldType = 'none';
    $subShield = 0;
}
if ($objUseShield !== null) {
    $objShieldType = $objUseShield['name'];
    $objShield = $objUseShield['defense'];
} else {
    $objShieldType = 'none';
    $objShield = 0;
}
