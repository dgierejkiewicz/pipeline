<?php

require_once 'Pipe.php';

$pipeline = (new Pipeline())
//        ->pipe(function($number) {
//            return $number * 2;
//        })
//        ->pipe(function($number) {
//            return $number * pi();
//        })
//        ->pipe(function($number) {
//            return ($number / pi()) / 2;
//        })
        ->pipe('str_rot13')
        ->pipe('mb_strtoupper')
        ->process(['c', 'v', 'c', 'r'])
;

print_r($pipeline);
exit;