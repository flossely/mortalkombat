<?php

$subActions = ['tract', 'move', 'pull', 'punch', 'kick', 'slash', 'shoot', 'grapple'];
$subActionCount = count($subActions);
$subAction = $subActions[rand(0, $subActionCount - 1)];

if ($subAction == "tract") {
    $getDist = dist($subX,$subY,$subZ,$objX,$objY,$objZ);
    $subX = $objX;
    $subY = $objY;
    $subZ = $objZ;
    $subScore += $getDist;
    echo $turnNum.' : '.$subFullName.' '.$spacedictus[$proLingo]["tract"].' ('.$getDist.') '.$objFullName.'<br>';
} elseif ($subAction == "move") {
    $msgBox = movement($turnNum, $subFullName, $subX, $subY, $subZ, 1, 0.1);
    $subX = $msgBox['x'];
    $subY = $msgBox['y'];
    $subZ = $msgBox['z'];
} elseif ($subAction == "pull") {
    $getDist = dist($subX,$subY,$subZ,$objX,$objY,$objZ);
    $objX = $subX;
    $objY = $subY;
    $objZ = $subZ;
    $subScore += $getDist;
    echo $turnNum.' : '.$subFullName.' '.$spacedictus[$proLingo]["pull"].' ('.$getDist.') '.$objFullName.'<br>';
} elseif ($subAction == "punch") {
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
