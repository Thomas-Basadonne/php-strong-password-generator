<!-- Dobbiamo creare una pagina che permetta ai nostri utenti di utilizzare il nostro generatore di password (abbastanza) sicure.
L'esercizio è suddiviso in varie milestone ed è molto importante svilupparle in modo ordinato.

Milestone 1
Creare un form che invii in GET la lunghezza della password. Una nostra funzione utilizzerà questo dato per generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all'utente.
Scriviamo tutto (logica e layout) in un unico file *index.php*

Milestone 2
Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file *functions.php* che includeremo poi nella pagina principale

Milestone 3 (BONUS)
Invece di visualizzare la password nella index, effettuare un redirect ad una pagina dedicata che tramite $_SESSION recupererà la password da mostrare all'utente.

Milestone 4 (BONUS)
Gestire ulteriori parametri per la password: quali caratteri usare fra numeri, lettere e simboli. Possono essere scelti singolarmente (es. solo numeri) oppure possono essere combinati fra loro (es. numeri e simboli, oppure tutti e tre insieme).
Dare all'utente anche la possibilità di permettere o meno la ripetizione di caratteri uguali.
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generatore Password</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<h1 class="text-center text-success my-5">GENERA LA TUA PASSWORD SICURA</h1>
<form action="index.php" method="GET" class="text-center">
    <label for="password-length">Selezionare lunghezza password:</label>
    <br>
    <input type="number" name="password-length" id="password-length" min="4" max="20" >
    <input type="submit" value="Crea" class="btn btn-success">
</form>

<?php 

if(isset($_GET['password-length'])){
    $length= $_GET['password-length'];

    function generate_password($length){
        $caratteri="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $password="";

        for($i=0; $i<$length; $i++){
            $password .= $caratteri[rand(0, strlen($caratteri)-1)];
        }
        return $password;
    }
    $password= generate_password($length);

    echo "la tua password sicura è: $password";
}

?>
    
</body>
</html>