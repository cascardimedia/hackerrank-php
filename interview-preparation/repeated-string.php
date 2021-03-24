<?php
// Repeated String

// Complete the repeatedString function below.
function repeatedString($s, $n) {
  $strlen = strlen($s);
  $r = $n % $strlen;

  $c = substr_count($s, 'a');
  $m = number_format($n/$strlen, 0, '', '');

  $a = ($m * $c);

  $a += substr_count(substr($s, 0, $r), 'a');
  return $a;
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
