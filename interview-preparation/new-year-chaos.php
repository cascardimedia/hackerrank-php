<?php

// Complete the minimumBribes function below.
function minimumBribes($q) {
    foreach ($q as $k => $v) {
        $pos = $k +1;
        $bribes = $v - $pos;
        if ($bribes > 2) {
            echo 'Too chaotic'.PHP_EOL;
            return;
        }
    }
    $total = unwindQueue($q);
    echo $total.PHP_EOL;
}

function unwindQueue($q, $total = 0) {
       error_log("Queue is now: " . implode(', ', $q));
       error_log("Total is now: {$total}");
       $n = count($q);
       $sorted = $q;
       sort($sorted, SORT_NUMERIC);
       while ($q !== $sorted) {
        
        foreach(range($n, 1) as $sticker) {
           error_log("Searching for $sticker");
           $key = array_search($sticker, $q);
           $pos = $key +1;  
            if ($sticker === $pos) {
                if ($sticker === 1) {
                    return $total;
                }
                 continue;
           } else {
               error_log ("Send them back!".PHP_EOL);
               $tmp = $q[$key + 1];
               $q[$key] = $tmp;
               $q[$pos] = $sticker;
               $total += 1;
               // unwindQueue($q, $total);
               error_log("Queue is now: " . implode(', ', $q));
               error_log("Total is now: {$total}");
           }
        }
       }
       return $total;
}

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $t);

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    fscanf($stdin, "%d\n", $n);

    fscanf($stdin, "%[^\n]", $q_temp);

    $q = array_map('intval', preg_split('/ /', $q_temp, -1, PREG_SPLIT_NO_EMPTY));

    minimumBribes($q);
}

fclose($stdin);
<?php

// Complete the minimumBribes function below.

//


function minimumBribes($q) {
    
}


$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $t);

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    fscanf($stdin, "%d\n", $n);

    fscanf($stdin, "%[^\n]", $q_temp);

    $q = array_map('intval', preg_split('/ /', $q_temp, -1, PREG_SPLIT_NO_EMPTY));

    minimumBribes($q);
}

fclose($stdin);
