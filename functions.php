<?php


function generatePassword($lunghezza, $duplica_caratteri){
    //lunghezza massima password 
    $limite = 15;
    if($lunghezza > $limite){
        $lunghezza= $limite;
    }

    $caratteri = 'abcdefghijlmnopqrstuvwxyzABCDEFGHIJLMNOPQRSTUVWXYZ0123456789_?*+&%!#@';

    if($duplica_caratteri){
        $caratteri .= $caratteri;
    }

    $len_caratteri = strlen($caratteri);

    $password_random = "";


    for($i = 0; $i < $lunghezza; $i++ ){
        $numero_random = rand(0,$len_caratteri -1 );
        $password_random.= $caratteri[$numero_random];
    }

    return $password_random;
}
   