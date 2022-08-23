<?php

$subActions = ["tract", "strafe", "pull", "punch", "kick", "grapple"];

if (file_exists($sub."/special.combo.obj")) {
    $subSpecialMoves = getArrayFromFile($sub."/special.combo.obj");
    $subActions[] = "special";
}

$subActionCount = count($subActions);
$subAction = $subActions[rand(0, $subActionCount - 1)];
if ($subAction == "tract") {
    $subX = $objX;
    $subY = $objY;
    $subZ = $objZ;
    $subScore += 10;
    echo $turnNum . " : " . $subFullNotation . ' '. $spacedictus[$proLingo]["tract"] . " " . $objFullNotation . "<br>";
} elseif ($subAction == "strafe") {
    $msgBox = movement($turnNum, $subNotation, $subX, $subY, $subZ, 1, 0.1);
    $subX = $msgBox['x'];
    $subY = $msgBox['y'];
    $subZ = $msgBox['z'];
} elseif ($subAction == "pull") {
    $objX = $subX;
    $objY = $subY;
    $objZ = $subZ;
    $subScore += 20;
    echo $turnNum . " : " . $subFullNotation . ' '. $spacedictus[$proLingo]["pull"] . " " . $objFullNotation . "<br>";
} elseif ($subAction == "punch") {
    $objRating -= 5;
    $subScore += 10;
    echo $turnNum . " : " . $subHalfNotation . $spacedictus[$proLingo]["punch"] . $objHalfNotation . "<br>";
} elseif ($subAction == "kick") {
    $objRating -= 10;
    $subScore += 20;
    echo $turnNum . " : " . $subHalfNotation . $spacedictus[$proLingo]["kick"] . $objHalfNotation . "<br>";
} elseif ($subAction == "grapple") {
    $objRating -= 20;
    $subScore += 30;
    echo $turnNum . " : " . $subHalfNotation . $spacedictus[$proLingo]["grapple"] . $objHalfNotation . "<br>";
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
    echo $turnNum . " : " . $subHalfNotation . $spacedictus[$proLingo]["special"] . $objHalfNotation . "<br>";
}
