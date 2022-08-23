<?php

$subActions = ["strafe"];
$subActionCount = count($subActions);
$subAction = $subActions[rand(0, $subActionCount - 1)];

if ($subAction == "strafe") {
    $msgBox = movement($turnNum, $subHalfNotation, $subX, $subY, $subZ, 1, 0.1);
    $subX = $msgBox['x'];
    $subY = $msgBox['y'];
    $subZ = $msgBox['z'];
}
