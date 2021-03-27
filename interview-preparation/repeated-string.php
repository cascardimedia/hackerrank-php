<?php
// Repeated String

// Complete the repeatedString function below.

function repeatedString($s, $n) {
    // Memory limit is 2097152
    if ($n <= 2000000) {
        $times = ceil( $n / strlen($s));
        $string = substr(str_repeat($s, $times), 0, $n);
        return substr_count($string, 'a');
    } else {
        // The entire string will not fit into memory so we must do
        // this as a calculation and not a direct count operation
        $strlen = strlen($s);
        $r = $n % $strlen;

        $c = substr_count($s, 'a');
        $m = floor($n/$strlen);
        $a = ($m * $c);
        $a += substr_count(substr($s, 0, $r), 'a');
        return $a;
    }
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
