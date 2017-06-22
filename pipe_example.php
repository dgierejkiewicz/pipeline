<?php

require_once 'Pipe.php';

$pipeline = (new Pipeline())
        ->pipe(function($number) {
            return $number * 2;
        })
        ->pipe(function($number) {
            return $number * pi();
        })
        ->pipe(function($number) {
            return ($number / pi()) / 2;
        })
        ->process(1)
;

print_r($pipeline);
exit;