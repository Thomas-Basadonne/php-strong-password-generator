<?php 

function generate_password($length){
    $caratteri="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $password="";

    for($i=0; $i<$length; $i++){
        $password .= $caratteri[rand(0, strlen($caratteri)-1)];
    }
    return $password;
}

?>