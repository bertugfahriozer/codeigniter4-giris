<?php
function randNum($min,$max){
    echo rand($min,$max);
}

function _printrDie($data){
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    die();
}