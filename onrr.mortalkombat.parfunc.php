<?php

$subActions = ['punch', 'kick', 'grapple'];
$subActionCount = count($subActions);
$subAction = $subActions[rand(0, $subActionCount - 1)];

if ($subAction == "punch") {
    $objRating -= $subPunchForce;
    $subScore += $subPunchForce;
    echo $turnNum.' : '.$subFullName.' '.$spacedictus[$proLingo]["punch"].' ('.$subPunchForce.') '.$objFullName.'<br>';
} elseif ($subAction == "kick") {
    $objRating -= $subKickForce;
    $subScore += $subKickForce;
    echo $turnNum.' : '.$subFullName.' '.$spacedictus[$proLingo]["kick"].' ('.$subKickForce.') '.$objFullName.'<br>';
} elseif ($subAction == "grapple") {
    $objRating -= $subGrappleForce;
    $subScore += $subGrappleForce;
    echo $turnNum.' : '.$subFullName.' '.$spacedictus[$proLingo]["grapple"].' ('.$subGrappleForce.') '.$objFullName.'<br>';
}
