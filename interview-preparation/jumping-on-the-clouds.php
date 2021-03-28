<?php

 
// Complete the jumpingOnClouds function below.
function jumpingOnClouds($c) {
  $count = count($c);
  $pos = 1;
  $jumps = [];
  while ($pos < $count) {
    $nextPair = array_slice($c, $pos, 2);
    if (count($nextPair) == 1) {
      $pos += 1;
    }
    // Check where the next jump should be
    if ($nextPair === [0, 0]) {
      $pos += 2;
    }

    if (isset($nextPair[1]) && $nextPair[1] == 1) {
      $pos += 1;
    }
    // Must skip if the next cloud is thundercloud
    else if ($nextPair[0] == 1) {
      $pos += 2;
    }

    $jumps[] = $pos;
  }
  return count($jumps);
}


$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $n);

fscanf($stdin, "%[^\n]", $c_temp);

$c = array_map('intval', preg_split('/ /', $c_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = jumpingOnClouds($c);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
