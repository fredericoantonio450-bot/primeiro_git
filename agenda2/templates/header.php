<?php
include_once "config/process.php"; /// Incluindo o arquivo que precede de lógica para site

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!--Bootstrap-->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

   <!-- Icons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
   <!--Style-->

   <link rel="stylesheet" href ="CSS/style.css">
   
   <!--FONTES-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cambo&family=Chonburi&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Smooch+Sans:wght@100..900&display=swap" rel="stylesheet">

   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@100..800&display=swap" rel="stylesheet">
    
   
   <title>AGENDA</title>
</head>
<body>

<!-- NAVBAR -->

  <nav class="navbar navbar-expand-lg navbar-light bg">
  <a class="navbar-brand" href=""></a>
  <!--LOGO-->

  <a href = "index.php"> <img class = "logo-nav" src="IMG/logo agenda.png" alt="Descrição da imagem"> </a>

  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">

        <!-- BOTÕES -->

      <li class="nav-item active">
        <a class="nav-link" id="palavra-nav" href = "index.php">Agenda</a>
      </li>

      <li class="nav-item">
        <a class="nav-link"  id="palavra-nav" href="create.php">Novo contato</a>
      </li>
    </ul>

  </div> 

</nav>
 
