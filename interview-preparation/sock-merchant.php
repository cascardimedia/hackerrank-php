<?php

// Complete the sockMerchant function below.
function sockMerchant($n, $ar) {
    $howManyPairs = 0;
    $matrix = [];
    foreach($ar as $v) {
        if(!isset($matrix[$v])) {
            $matrix[$v] = 0;
        }
        $matrix[$v] += 1;
    }
    //    print_r($matrix);
    foreach($matrix as $color => $n) {
        if($n === 1) {
            continue;
        }
        $howManyPairs += (( ($n % 2) == 1) ? ($n - 1) /2 : $n / 2);
    }
    return $howManyPairs;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $n);

fscanf($stdin, "%[^\n]", $ar_temp);

$ar = array_map('intval', preg_split('/ /', $ar_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = sockMerchant($n, $ar);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);

// EOF
