<?php
    function assertEquals($expected, $actual, $description = '',$line ='')
    {
        if($expected === $actual){
            echo "PASS | $description \n";
            echo "atteso: $expected (".gettype($expected).") \n";
            echo "ottenuto: $actual (".gettype($actual).") \n";
            echo $line ? "line $line \n" : "\n";
        } else {
            echo "FAIL | $description \n";
            echo "atteso: $expected (".gettype($expected).") \n";
            echo "ottenuto: $actual (".gettype($actual).") \n";
            echo $line ? "line $line \n" : "\n";
        }

    }

?>