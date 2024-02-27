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
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css' integrity='sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==' crossorigin='anonymous' />
    <link rel="stylesheet" href="style.css">
    <title>PHP-STRONG-PASSWORD-GENERATOR</title>
</head>

<body>
    <div class="bg-blue  container-fluid p-0 vh-100 ">
        <div class="container d-flex justify-content-center flex-column p-4  ">

            <div class="text-center d-flex flex-column gap-3 pt-4">
                <h1 class="text-capitalize text-secondary  ">strong password generator</h1>
                <h3 class="text-capitalize text-white">genera una password sicura </h3>
            </div>
            <div class=" rounded-2 text-secondary  bg-info-subtle p-3 ">
                <?php
                
                session_start();

                if (isset($_GET['generator']) && isset($_GET['yes']) && !isset($_SESSION['password_generated'])) {
                  
                    $_SESSION['password_generated'] = true;

                    if (is_numeric($_GET['generator'])) {
                        $lunghezza = (int)$_GET['generator'];

                        if ($lunghezza >= 1 && $lunghezza <= 15) {
                            
                            include_once __DIR__ . '/functions.php';

                            $duplica_caratteri = isset($_GET['yes']) && $_GET['yes'] == 1;
                            $password_generata = generatePassword($lunghezza, $duplica_caratteri);

                           
                            echo "Password generata: " . $password_generata;
                        } else {
                            echo "La lunghezza deve essere compresa tra 1 e 15.";
                        }
                    } else {
                        echo "Inserire un numero valido per la lunghezza.";
                    }
                } elseif (isset($_SESSION['password_generated'])) {
                    echo "La password è già stata generata in questa sessione.";
                } else {
                    echo "Nessun parametro valido inserito.";
                }

                session_unset();
                session_destroy();
                ?>


            </div>

            <div class="border border-1  rounded-2 p-3 bg-white mt-3">
                <form class="d-flex" action="index.php" method="get">
                    <div class="col mt-3 ">

                        <div class="mb-3 d-flex justify-content-between  ">
                            <label for="generator" class="form-label">Lunghezza password: </label>
                            <div class="col-3">
                                <input type="number" min="1" max="100" name="generator" id="generator" class="form-control" />
                            </div>
                        </div>


                        <div class="mb-3 d-flex ">
                            <div class="d-flex flex-column gap-2 col-9  ">
                                <label for="generator" class="form-label">Consenti ripetizioni di uno o più caratteri:</label>
                            </div>

                            <div class="d-flex flex-column gap-2 justify-content-end col-3  ">
                                <div class="d-flex gap-1 ">
                                    <input class="rounded-5 " type="radio" name="yes" id="yes" class="form-control" />
                                    <span>Si</span>
                                </div>
                                <div class="d-flex gap-1">
                                    <input class="rounded-5 " type="radio" name="no" id="no" class="form-control" />
                                    <span>No</span>
                                </div>
                            </div>
                        </div>



                        <div class="mb-3 d-flex justify-content-end col-10  ">

                            <div class="d-flex flex-column gap-2  ">
                                <div>
                                    <input type="checkbox" name="" id="">
                                    <span>Lettere</span>
                                </div>
                                <div>
                                    <input type="checkbox" name="" id="">
                                    <span>Numeri</span>
                                </div>
                                <div>
                                    <input type="checkbox" name="" id="">
                                    <span>Simboli</span>
                                </div>
                            </div>
                        </div>


                        <div class="mt-3 mb-4">
                            <button type="submit" class="btn btn-primary ">invia</button>
                            <button type="reset" class="btn btn-primary "> annulla</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>


    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js' integrity='sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==' crossorigin='anonymous'></script>
</body>

</html>