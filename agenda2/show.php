<?php
include_once "templates/header.php";



?>

<?php include_once "templates/backbtn.php"; ?>

    <ion-icon class="perso" name="person-circle-outline"></ion-icon>
    <h1 class="nome-principal"><?=$usuario["nome"];?></h1>
    <div class="conteudo">
        
    <div class= "show">
         <p style="color:#7513e5 ;"><strong>Telefone</strong></p>
     <p><?=$usuario["telefone"];?></p>
         <p style="color:#7513e5 ;"><strong>Observação</strong></p>
     <p><?=$usuario["observacao"];?></p>
    </div>

    </div>
    
<?php include_once "templates/footer.php"; ?>