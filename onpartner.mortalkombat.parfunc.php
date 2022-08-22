<?php

$subActions = ["lotus_pose", "strafe"];
$subActionCount = count($subActions);
$subAction = $subActions[rand(0, $subActionCount - 1)];
if ($subAction == "lotus_pose") {
    $subRating += 0.01;
    $subScore += 1;
    echo $turnNum .
        " : " .
        $subModeSign .
        $sub .
        "[" .
        $subRating .
        "] " .
        $spacedictus[$proLingo]["pass"] .
        "<br>";
} elseif ($subAction == "strafe") {
    echo movement($turnNum, $subNotation, $subX, $subY, $subZ, 3, $subMove);
}
