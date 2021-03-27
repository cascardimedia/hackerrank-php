<?php


/*
 * Complete the 'getMaxUnits' function below.
 *
 * The function is expected to return a LONG_INTEGER.
 * The function accepts following parameters:
 *  1. LONG_INTEGER_ARRAY boxes
 *  2. LONG_INTEGER_ARRAY unitsPerBox
 *  3. LONG_INTEGER truckSize
 */

function getMaxUnits($boxes, $unitsPerBox, $truckSize) {
    if ($truckSize === 1 ) {
        return max($unitsPerBox);
    }
    // Write your code here
     $n = count($boxes);
     $totals = [];
     for ($i = 0; $i <= $n; $i += 1 ) {
        $totals[] = $boxes[$i]*$unitsPerBox[$i];
     }
    sort($totals, SORT_NUMERIC);

    $maxUnits = array_sum(array_slice($totals, $n - $truckSize));
    return $maxUnits;
    
}
$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$boxes_count = intval(trim(fgets(STDIN)));

$boxes = array();

for ($i = 0; $i < $boxes_count; $i++) {
    $boxes_item = intval(trim(fgets(STDIN)));
    $boxes[] = $boxes_item;
}

$unitsPerBox_count = intval(trim(fgets(STDIN)));

$unitsPerBox = array();

for ($i = 0; $i < $unitsPerBox_count; $i++) {
    $unitsPerBox_item = intval(trim(fgets(STDIN)));
    $unitsPerBox[] = $unitsPerBox_item;
}

$truckSize = intval(trim(fgets(STDIN)));

$result = getMaxUnits($boxes, $unitsPerBox, $truckSize);

fwrite($fptr, $result . "\n");

fclose($fptr);
