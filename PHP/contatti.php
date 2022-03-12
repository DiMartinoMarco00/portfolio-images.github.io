<?php

$errore = "";
$messaggio = "";

if($_POST) 
{
  if(!$_POST['email'])
  {
    $errore = "E' richiesta una mail";
  }

  if(!$_POST['nome_cognome'])
  {
    $errore = "Sono richiesti nome e cognome";
  }

  if(!$_POST['oggetto'])
  {
    $errore = "E' richiesto l' oggetto del messaggio";
  }

  if(!$_POST['messaggio'])
  {
    $errore = "E' richiesto un messaggio";
  }

  if($_POST['email'] && filter_var($_POST['email'] , FILTER_VALIDATE_EMAIL)  === false) 
  {
    $errore = "ops, questa meail non è valida!";
  }

  if($errore != "")
  {
    $errore = "<div class= 'alert alert-warning' role='alert'>Ci sono errori nel tuo modulo: " .$errore . "</div";
  } 
  else
  {

    $indirizzo = "dimartinomarco00@gmail.com";
    $nome = $_POST['nome_cognome'];
    $oggetto = "Oggetto: " .$_POST['oggetto'];
    $contenuto = "Testo del messaggio: " .$_POST['messaggio'];
    $headers = "From: " . $_POST['email'];

    if(mail($indirizzo, $nome,$oggetto,$contenuto, $headers))
    {
      $messaggio = "<div class= 'alert alert-success' role='alert'>Grazie per averci contattati. Ti risponderemo al più presto! </div";
    }
    else
    {

      $messaggio = "<div class= 'alert alert-danger' role='alert'>Errore nell'invio! Riprova</div";
    }
  }
}
?>   <!-- Fine codice PHP -->

<!DOCTYPE html>
    <html lang="it">
    <head>
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portfolio</title>
<!-- css -->
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/stile.css">
<link rel="stylesheet" href="css/font-awesome.css">
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Bowlby+One|PT+Sans:400,700" rel="stylesheet">
    <!--[if lt IE 9]>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
   <![endif]-->
  </head>
<body>

    <!--  Header-->
<header>
<div class="container-fluid" id="intestazione">
<div class="row">

<div class="col-md-12"></div>
<div class="intro-text">
<h1>Il mio portfolio</h1>
<span><i class="fa fa-camera-retro fa-4x" aria-hidden="true"></i>
</span>
<h2>Foto artistiche e naturalistiche</h2>
</div>
</div>
</div>
</header>


  <div class="container">
  	<div class="row">
        <div class="col-md-8 col-md-offset-2" id="messaggiForm">
<!-- Questo script PHP serve per mostrare un messaggio di errore o successo per l'invio della mail -->
<div><?php echo $errore . $messaggio; ?></div>
        </div>
  	</div>
  </div>

<!-- Aggiungi quello che vuoi e personalizza come vuoi con  CSS -->
</body>
<!-- Script -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
</html>
