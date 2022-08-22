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
    $subDirect = rand(0, 1);
    if ($subDirect == 0) {
        $subX += 0.1;
        echo $turnNum .
            " : " .
            $subModeSign .
            $sub .
            "[" .
            $subRating .
            "] " .
            $spacedictus[$proLingo]["right"] .
            " {" .
            $subX .
            ";" .
            $subY .
            ";" .
            $subZ .
            "}<br>";
    } elseif ($subDirect == 1) {
        $subX -= 0.1;
        echo $turnNum .
            " : " .
            $subModeSign .
            $sub .
            "[" .
            $subRating .
            "] " .
            $spacedictus[$proLingo]["left"] .
            " {" .
            $subX .
            ";" .
            $subY .
            ";" .
            $subZ .
            "}<br>";
    }
}
