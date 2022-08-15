<?php

$subActions = ["lotus_pose", "strafe"];
$subActionCount = count($subActions);
$subAction = $subActions[rand(0, $subActionCount - 1)];
if ($subAction == "lotus_pose") {
    $subRating += 0.01;
    $subScore += 1;
    echo turnFormat($paradigm, $today) .
        " : " .
        $subModeSign .
        $sub .
        "[" .
        $subRating .
        "] " .
        $spacedictus[$lingua]["pass"] .
        "<br>";
} elseif ($subAction == "strafe") {
    $subDirect = rand(0, 1);
    if ($subDirect == 0) {
        $subX += 0.1;
        echo turnFormat($paradigm, $today) .
            " : " .
            $subModeSign .
            $sub .
            "[" .
            $subRating .
            "] " .
            $spacedictus[$lingua]["right"] .
            " {" .
            $subX .
            ";" .
            $subY .
            ";" .
            $subZ .
            "}<br>";
    } elseif ($subDirect == 1) {
        $subX -= 0.1;
        echo turnFormat($paradigm, $today) .
            " : " .
            $subModeSign .
            $sub .
            "[" .
            $subRating .
            "] " .
            $spacedictus[$lingua]["left"] .
            " {" .
            $subX .
            ";" .
            $subY .
            ";" .
            $subZ .
            "}<br>";
    }
}
