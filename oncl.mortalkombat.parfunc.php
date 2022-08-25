<?php

$subActions = ['punch', 'kick', 'slash', 'shoot', 'grapple'];
$subActionCount = count($subActions);
$subAction = $subActions[rand(0, $subActionCount - 1)];

if ($subAction == "punch") {
    $objRating -= $subPunchForce;
    $subRating += $subPunchForce;
    $subScore += $subPunchForce;
    echo $turnNum.' : '.$subFullName.' '.$spacedictus[$proLingo]["punch"].' ('.$subPunchForce.') '.$objFullName.'<br>';
} elseif ($subAction == "kick") {
    $objRating -= $subKickForce;
    $subRating += $subKickForce;
    $subScore += $subKickForce;
    echo $turnNum.' : '.$subFullName.' '.$spacedictus[$proLingo]["kick"].' ('.$subKickForce.') '.$objFullName.'<br>';
} elseif ($subAction == "slash") {
    if ($objUseShield !== null) {
        $objRating -= $subMeleeForce + $objShield;
        $subRating += $subMeleeForce - $objShield;
        $subScore += $subMeleeForce - $objShield;
        echo $turnNum." : ".$subFullName.' '.$subMeleeType." (".$subMeleeForce."/".$objShield.") ".$objFullName."<br>";
    } else {
        $objRating -= $subMeleeForce;
        $subRating += $subMeleeForce;
        $subScore += $subMeleeForce;
        echo $turnNum." : ".$subFullName.' '.$subMeleeType." (".$subMeleeForce.") ".$objFullName."<br>";
    }
} elseif ($subAction == "shoot") {
    if ($objUseShield !== null) {
        $objRating -= $subForce + $objShield;
        $subRating += $subForce - $objShield;
        $subScore += $subForce - $objShield;
        echo $turnNum." : ".$subFullName.' '.$subForceType." (".$subForce."/".$objShield.") ".$objFullName."<br>";
    } else {
        $objRating -= $subForce;
        $subRating += $subForce;
        $subScore += $subForce;
        echo $turnNum." : ".$subFullName.' '.$subForceType." (".$subForce.") ".$objFullName."<br>";
    }
} elseif ($subAction == "grapple") {
    $objRating -= $subGrappleForce;
    $subRating += $subGrappleForce;
    $subScore += $subGrappleForce;
    echo $turnNum.' : '.$subFullName.' '.$spacedictus[$proLingo]["grapple"].' ('.$subGrappleForce.') '.$objFullName.'<br>';
}
