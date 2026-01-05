<?php
// Inclui o arquivo que processa os dados do formulário (conexão com o banco e cadastro)
include_once "config/process.php";
?>

<!-- Inclui o cabeçalho do site (HTML inicial, Bootstrap, CSS, menu, etc) -->
<?php include_once "templates/header.php"; ?>

<form action="config/process.php" method="POST">

    <!-- Botão de voltar reutilizável -->
    <?php include_once "templates/backbtn.php"; ?> 

    <!-- Título da página -->
    <div class="titulo">
        <h2>CRIANDO CONTATO</h2>
    </div>

    <!-- Conteúdo principal do formulário -->
    <div class="conteudo">
        <div class="container-criar">
            <div class="form-group">

                <input type="hidden" name="formulario" value="cadastrar">

                <!-- Campo para o nome do contato -->
                <label>Nome do Contato:</label>
                <input type="text" class="form-control" placeholder="name" name="nome" required>
            </div>

            <!-- Campo para o telefone do contato -->
            <div class="form-group">
                <label>Telefone:</label>
                <input type="number" class="form-control" placeholder="number" name="telefone" required>
            </div>

            <!-- Campo para observações adicionais -->
            <div class="form-group">
                <label>Observação:</label>
                <textarea class="form-control" rows="3" name="observacao" required></textarea>
            </div> 
            
            <!--Botão de envio do formulário-->
            <button type="submit" class="btn btn-primary btn-sm">
                Cadastrar
            </button>
        </div>
       
    </div>
</form>

<!-- Inclui o rodapé do site -->
<?php include_once "templates/footer.php"; ?>
