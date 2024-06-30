<?php

if(!function_exists("SortByIdTesting")){

    function SortByIdTesting($x, $y){

        return strcasecmp($x['id_testing'], $y['id_testing']);
    }
}

if(!function_exists("SortByDistance")){

    function SortByDistance($x, $y){

        return $x['distance'] - $y['distance'];
    }
}

if(!function_exists("cmp")){
    function cmp($a, $b) {
        return strcmp($a->jarak, $b->jarak);
    }
}