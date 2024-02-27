<?php
/*
Descrizione

Dobbiamo creare una pagina che permetta ai nostri utenti di utilizzare il nostro generatore di password (abbastanza) sicure.

L’esercizio è suddiviso in varie milestone ed è molto importante svilupparle in modo ordinato.

Milestone 1
Creare un form che invii in GET la lunghezza della password. Una nostra funzione utilizzerà questo dato per generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente.
Scriviamo tutto (logica e layout) in un unico file index.php

Milestone 2
Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file functions.php che includeremo poi nella pagina principale

--------------------------------------------------------
Milestone 3 (BONUS)
Invece di visualizzare la password nella index, effettuare un redirect ad una pagina dedicata che tramite $_SESSION recupererà la password da mostrare all’utente.

Milestone 4 (BONUS)
Gestire ulteriori parametri per la password: quali caratteri usare fra numeri, lettere e simboli. Possono essere scelti singolarmente (es. solo numeri) oppure possono essere combinati fra loro (es. numeri e simboli, oppure tutti e tre insieme).
Dare all’utente anche la possibilità di permettere o meno la ripetizione di caratteri uguali.
*/

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-STRONG-PASSWORD-GENERATOR</title>
</head>
<body>

<?php


function generatePassword($lunghezza){
    //lunghezza massima password 
    $limite = 15;
    if($lunghezza > $limite){
        $lunghezza= $limite;
    }

    $caratteri = 'abcdefghijlmnopqrstuvwxyzABCDEFGHIJLMNOPQRSTUVWXYZ0123456789_?*+&%!#@';

    $len_caratteri = strlen($caratteri);

    $password_random = "";


    for($i = 0; $i < $lunghezza; $i++ ){
        $numero_random = rand(0,$len_caratteri -1 );
        $password_random.= $caratteri[$numero_random];
    }

    return $password_random;
}
    echo generatePassword(8) ;
?>

<div>
    <form class="d-flex" action="index.php" method="get">
        <div class="col">
            <div class="mb-3">
                <label for="generator" class="form-label">lunghezza password: </label>
                <input
                    type="text"
                    name="generator"
                    id="generator"
                    class="form-control"
                   
                />
                <button type="submit">invia</button>
                <button type="reset"> annulla</button>
            </div>
        </div>
    </form>

    
    
</div>
    
</body>
</html>