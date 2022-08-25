<?php

$subActions = ["tract", "strafe", "pull", "punch", "kick", "grapple", "shop", "train"];

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
    echo $turnNum . " : " . $subFullName . ' '. $spacedictus[$proLingo]["tract"] . ' ' . $objFullName . "<br>";
} elseif ($subAction == "strafe") {
    $msgBox = movement($turnNum, $subFullName, $subX, $subY, $subZ, 1, 0.1);
    $subX = $msgBox['x'];
    $subY = $msgBox['y'];
    $subZ = $msgBox['z'];
} elseif ($subAction == "pull") {
    $objX = $subX;
    $objY = $subY;
    $objZ = $subZ;
    $subScore += 20;
    echo $turnNum . " : " . $subFullName . ' '. $spacedictus[$proLingo]["pull"] . ' ' . $objFullName . "<br>";
} elseif ($subAction == "punch") {
    $objRating -= 5;
    $subScore += 10;
    echo $turnNum . " : " . $subFullName . ' ' . $spacedictus[$proLingo]["punch"] . ' ' . $objFullName . "<br>";
} elseif ($subAction == "kick") {
    $objRating -= 10;
    $subScore += 20;
    echo $turnNum . " : " . $subFullName . ' ' . $spacedictus[$proLingo]["kick"] . ' ' . $objFullName . "<br>";
} elseif ($subAction == "grapple") {
    $objRating -= 20;
    $subScore += 30;
    echo $turnNum . " : " . $subFullName . ' ' . $spacedictus[$proLingo]["grapple"] . ' ' . $objFullName . "<br>";
} elseif ($subAction == "shop") {
    $msgBox = initExchange($thisParadigm, $yearToday, '.', $sub, $proMoney, $subMoney, ratioCalc($proEconVal, $subEconVal), $proUseMelee);
    $proMoney = $msgBox['debit'];
    $subMoney = $msgBox['credit'];
} elseif ($subAction == "train") {
    $msgBox = initExchange($thisParadigm, $yearToday, '.', $sub, $proMoney, $subMoney, ratioCalc($proEconVal, $subEconVal), $proUseCombo);
    $proMoney = $msgBox['debit'];
    $subMoney = $msgBox['credit'];
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
    echo $turnNum . " : " . $subFullName . ' ' . $spacedictus[$proLingo]["special"] . ' ' . $objFullName . "<br>";
}
