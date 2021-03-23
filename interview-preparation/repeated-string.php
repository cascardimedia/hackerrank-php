<?php
// Repeated String

// Complete the repeatedString function below.
function repeatedString($s, $n) {
    // $t = 1000000000000;
    $data = count_chars($s, 1);
    // $search  = str_repeat($s, 1000000000000);
    $count = $data[ord('a')];
    $length = strlen($s);
    $ratio = $count / $length;
    return number_format($n * $ratio, 0, '', '');
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

$s = '';
fscanf($stdin, "%[^\n]", $s);

fscanf($stdin, "%ld\n", $n);

$result = repeatedString($s, $n);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
