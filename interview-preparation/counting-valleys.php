<?php

/*
 * Complete the 'countingValleys' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER steps
 *  2. STRING path
 */

function countingValleys($steps, $path) {

  // Sea Level
  $elevation  = 0;
  $nValleys = 0;
  $aboveSeaLevel = false;
  $belowSeaLevel = false;
  //  $startcount  = null;
  $up = 'U';
  $dn = 'D';

  foreach (str_split($path) as $s) {
    if ($s == $up) {
      if ($elevation === 0) {
	$aboveSeaLevel = true;
      }
      $elevation += 1;
    }
    if ($s == $dn) {
      if ($elevation === 0) {
	$belowSeaLevel = true;
      }
      $elevation -=1;
    }
    if ($elevation === 0) {
      if ($belowSeaLevel === true) {
	$nValleys += 1;
      }
      
      $aboveSeaLevel = false;
      $belowSeaLevel = false;
    }
  }
  
  // Return the number of valleys
  return $nValleys;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$steps = intval(trim(fgets(STDIN)));

$path = rtrim(fgets(STDIN), "\r\n");

$result = countingValleys($steps, $path);

fwrite($fptr, $result . "\n");

fclose($fptr);
