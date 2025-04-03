<?php 
    function dump_die($data){
        echo "<pre>" . json_encode($data, JSON_PRETTY_PRINT) . "</pre>";
        die();
    }
    function version(){
        return '1.5.2';
    }
?>