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
    echo $turnNum .
        " : " .
        $subModeSign .
        $sub .
        "[" .
        $subRating .
        "] " .
        $spacedictus[$proLingo]["tract"] .
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
    echo movement($turnNum, $subNotation, $subX, $subY, $subZ, 1, 0.1);
} elseif ($subAction == "pull") {
    $objX = $subX;
    $objY = $subY;
    $objZ = $subZ;
    $subScore += 20;
    echo $turnNum .
        " : " .
        $subModeSign .
        $sub .
        "[" .
        $subRating .
        "] " .
        $spacedictus[$proLingo]["pull"] .
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
    $subRating += 5;
    $subScore += 10;
    echo $turnNum .
        " : " .
        $subModeSign .
        $sub .
        "[" .
        $subRating .
        "] " .
        $spacedictus[$proLingo]["punch"] .
        " " .
        $objModeSign .
        $obj .
        "[" .
        $objRating .
        "]<br>";
} elseif ($subAction == "kick") {
    $objRating -= 10;
    $subRating += 10;
    $subScore += 20;
    echo $turnNum .
        " : " .
        $subModeSign .
        $sub .
        "[" .
        $subRating .
        "] " .
        $spacedictus[$proLingo]["kick"] .
        " " .
        $objModeSign .
        $obj .
        "[" .
        $objRating .
        "]<br>";
} elseif ($subAction == "grapple") {
    $objRating -= 20;
    $subRating += 20;
    $subScore += 30;
    echo $turnNum .
        " : " .
        $subModeSign .
        $sub .
        "[" .
        $subRating .
        "] " .
        $spacedictus[$proLingo]["grapple"] .
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
    echo $turnNum .
        " : " .
        $subModeSign .
        $sub .
        "[" .
        $subRating .
        "] " .
        $spacedictus[$proLingo]["special_move"] .
        " (" .
        $subTactMoveCount .
        ") " .
        $objModeSign .
        $obj .
        "[" .
        $objRating .
        "]<br>";
}
