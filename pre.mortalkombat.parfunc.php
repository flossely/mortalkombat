<?php

if (file_exists($sub.'/punch.force')) {
    $subPunchForce = file_get_contents($sub.'/punch.force');
} else {
    $subPunchForce = 1;
}
if (file_exists($sub.'/kick.force')) {
    $subKickForce = file_get_contents($sub.'/kick.force');
} else {
    $subKickForce = 2;
}
if (file_exists($sub.'/grapple.force')) {
    $subGrappleForce = file_get_contents($sub.'/grapple.force');
} else {
    $subGrappleForce = 5;
}
