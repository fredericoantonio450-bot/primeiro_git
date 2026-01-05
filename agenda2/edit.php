<?php
// Inclui o arquivo responsável por buscar os dados do contato

include_once "config/process.php";
?>

<!-- Inclui o cabeçalho do site (HTML inicial, CSS, Bootstrap, etc) -->
<?php include_once "templates/header.php"; ?>

<!--Formulário usado para editar um contato existente, os dados são enviados via POST para o process.php-->
<form action="config/process.php" method="POST">

    <!-- Botão de voltar reutilizável -->
    <?php include_once "templates/backbtn.php"; ?> 

    <div class="titulo">
        <h2>EDITAR CONTATO</h2>
    </div>

    <!-- Área principal do formulário -->
    <div class="conteudo">
        <div class="container">

            <input type="hidden" name="atualizar" value="update">

            <input type="hidden" name="id" value="<?= $usuario["id"] ?>">

            <!-- Campo para editar o nome do contato -->
            <div class="form-group">
                <label>Nome do Contato:</label>
                <input type="text" class="form-control" name="nome" value="<?= $usuario["nome"]; ?>" required>
            </div>

            <!-- Campo para editar o telefone -->
            <div class="form-group">
                <label>Telefone:</label>
            
                <input type="number" class="form-control" name="telefone" value="<?= $usuario["telefone"]; ?>" required>
            </div>

            <!-- Campo para editar a observação -->
            <div class="form-group">
                <label>Observação:</label>
                <textarea class="form-control" rows="3" name="observacao"  required ><?= $usuario["observacao"]; ?></textarea>
            </div>

            <button type="submit" class="botao-atualizar btn-primary btn-sm">
                Atualizar
            </button>

        </div>
    </div>
</form>

<!-- Inclui o rodapé do site -->
<?php include_once "templates/footer.php"; ?>
