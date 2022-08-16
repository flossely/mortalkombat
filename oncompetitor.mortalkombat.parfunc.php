<?php

if (file_exists($sub . "/special.combo.obj")) {
    $subSpecialMoves = getObject($sub, "combo", "special");
    $subActions = [
        "tract",
        "strafe",
        "pull",
        "punch",
        "kick",
        "grapple",
        "special",
    ];
} else {
    $subActions = ["tract", "strafe", "pull", "punch", "kick", "grapple"];
}
$subActionCount = count($subActions);
$subAction = $subActions[rand(0, $subActionCount - 1)];
if ($subAction == "tract") {
    $subX = $objX;
    $subY = $objY;
    $subZ = $objZ;
    $subScore += 10;
    echo turnFormat($paradigm, $today) .
        " : " .
        $subModeSign .
        $sub .
        "[" .
        $subRating .
        "] " .
        $spacedictus[$lingua]["tract"] .
        " " .
        $objModeSign .
        $obj .
        "[" .
        $objRating .
        "] {" .
        $subX .
        ";" .
        $subY .
        ";" .
        $subZ .
        "}<br>";
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
} elseif ($subAction == "pull") {
    $objX = $subX;
    $objY = $subY;
    $objZ = $subZ;
    $subScore += 20;
    echo turnFormat($paradigm, $today) .
        " : " .
        $subModeSign .
        $sub .
        "[" .
        $subRating .
        "] " .
        $spacedictus[$lingua]["pull"] .
        " " .
        $objModeSign .
        $obj .
        "[" .
        $objRating .
        "] {" .
        $objX .
        ";" .
        $objY .
        ";" .
        $objZ .
        "}<br>";
} elseif ($subAction == "punch") {
    $objRating -= 5;
    $subScore += 10;
    echo turnFormat($paradigm, $today) .
        " : " .
        $subModeSign .
        $sub .
        "[" .
        $subRating .
        "] " .
        $spacedictus[$lingua]["punch"] .
        " " .
        $objModeSign .
        $obj .
        "[" .
        $objRating .
        "]<br>";
} elseif ($subAction == "kick") {
    $objRating -= 10;
    $subScore += 20;
    echo turnFormat($paradigm, $today) .
        " : " .
        $subModeSign .
        $sub .
        "[" .
        $subRating .
        "] " .
        $spacedictus[$lingua]["kick"] .
        " " .
        $objModeSign .
        $obj .
        "[" .
        $objRating .
        "]<br>";
} elseif ($subAction == "grapple") {
    $objRating -= 20;
    $subScore += 30;
    echo turnFormat($paradigm, $today) .
        " : " .
        $subModeSign .
        $sub .
        "[" .
        $subRating .
        "] " .
        $spacedictus[$lingua]["grapple"] .
        " " .
        $objModeSign .
        $obj .
        "[" .
        $objRating .
        "]<br>";
} elseif ($subAction == "special") {
    $subTactMoveCount = 0;
    foreach ($subSpecialMoves as $subTactMode => $subTactVar) {
        $subTactModeDiv = explode(":", $subTactMode);
        $subTactModeAction = $subTactModeDiv[0];
        $subTactModeTimes = $subTactModeDiv[1];
        if ($subTactModeAction == "attack") {
            $objRating -= $subTactVar;
            $subScore += 40;
        } elseif ($subTactModeAction == "pull") {
            $objX = $subX;
            $subScore += 30;
        } elseif ($subTactModeAction == "push") {
            if ($objX > $subX) {
                $objX + $subTactVar;
            } else {
                $objX - $subTactVar;
            }
            $subScore += 35;
        } elseif ($subTactModeAction == "harpoon") {
            $objX = $subX;
            $objRating -= $subTactVar;
            $subScore += 50;
        }
        if (is_numeric($subTactVar)) {
            $subTactNum = $subTactVar;
        } else {
            $subTactNum = 0;
        }
        $subTactMoveCount += $subTactNum;
    }
    echo turnFormat($paradigm, $today) .
        " : " .
        $subModeSign .
        $sub .
        "[" .
        $subRating .
        "] " .
        $spacedictus[$lingua]["special_move"] .
        " (" .
        $subTactMoveCount .
        ") " .
        $objModeSign .
        $obj .
        "[" .
        $objRating .
        "]<br>";
}