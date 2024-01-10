<?php
require "funct.php";
$tglDibuat = rumus(intval(substr($row['date'], 0, 4)), intval(substr($row['date'], 5, 2)), intval(substr($row['date'], 8, 2)));
$hariIni = rumus(intval(substr(date("Y-m-d"), 0, 4)), intval(substr(date("Y-m-d"), 5, 2)), intval(substr(date("Y-m-d"), 8, 2)));
$today = $hariIni == $tglDibuat;
// FUTURE
$tommorow = $tglDibuat - $hariIni == 1;
if ($tommorow == 1) {
    echo "Tommorow";
}
for ($i = 3; $i < 7; $i++) {
        ${"daysAFew" . $i} = $tglDibuat - $hariIni == $i;
        if (${"daysAFew" . $i} == 1) {
            echo "$i days a few";
        }
    }
for ($i = 1; $i < 4; $i++) {
        ${"weekAFew" . $i} = $tglDibuat - $hariIni >= $i * 7 && $tglDibuat - $hariIni <= (($i + 1 ) * 7) - 1;
        if (${"weekAFew" . $i}  == 1 ) {
            echo "$i week a few";
        }
    }
for ($i = 1; $i < 12; $i++) {
    ${"monthAFew" . $i} = $tglDibuat - $hariIni >= $i * 30 && $tglDibuat - $hariIni <= (($i + 1 ) * 30) - 1;
    if (${"monthAFew". $i}  == 1) {
        echo "$i month a few";
    }
}
for ($i = 1; $i < 300; $i++) {
    ${"monthAFew" . $i} = $tglDibuat - $hariIni >= $i * 360 && $tglDibuat - $hariIni <= (($i + 1 ) * 360) - 1;
    if (${"monthAFew". $i}  == 1) {
        echo "$i Year a few";
    }
}
//PAST
$yesterday = $tglDibuat - $hariIni == -1;
if(isset($mangeak))
if ($yesterday == 1) {
    echo "Yesterday";
}
for ($i = 3; $i < 7; $i++) {
        ${"daysAGo" . $i} = $tglDibuat - $hariIni == -($i);
        if (${"daysAGo" . $i} == true) {
            echo "$i days a go";
        }
    }
    
for ($i = 1; $i < 4; $i++) {
    ${"weekAGo" . $i} = $hariIni - $tglDibuat >= $i * 7 && $hariIni - $tglDibuat <= (($i + 1 ) * 7) - 1;
    if (${"weekAGo" . $i}  == 1 ) {
        echo "$i week a go";
    }
}

for ($i = 1; $i < 12; $i++) {
    ${"monthAGo" . $i} = $hariIni - $tglDibuat >= $i * 30 && $hariIni - $tglDibuat <= (($i + 1 ) * 30) - 1;
    if (${"monthAGo". $i}  == 1) {
        echo "$i month a go";
    }
}
for ($i = 1; $i < 300; $i++) {
    ${"monthAGo" . $i} = $hariIni - $tglDibuat >= $i * 360 && $hariIni - $tglDibuat <= (($i + 1 ) * 360) - 1;
    if (${"monthAGo". $i}  == 1) {
        echo "$i Year a go";
    }
}
?>