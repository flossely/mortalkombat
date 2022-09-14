<?php

$subActions = ['attack', 'weapon', 'melee'];
$subActionCount = count($subActions);
$subAction = $subActions[rand(0, $subActionCount - 1)];

if ($subAction == "attack") {
    $objRating -= $subMoveForce;
    $subScore += $subMoveForce;
    echo $turnNum.' : '.$subFullName.' '.$subMoveType.' ('.$subMoveForce.') '.$objFullName.'<br>';
} elseif ($subAction == "weapon") {
    $objRating -= $subForce;
    $subScore += $subForce;
    echo $turnNum.' : '.$subFullName.' '.$subForceType.' ('.$subForce.') '.$objFullName.'<br>';
} elseif ($subAction == "melee") {
    $objRating -= $subMeleeForce;
    $subScore += $subMeleeForce;
    echo $turnNum.' : '.$subFullName.' '.$subMeleeType.' ('.$subMeleeForce.') '.$objFullName.'<br>';
}
