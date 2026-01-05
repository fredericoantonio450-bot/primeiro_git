<?php 
// Inclui o arquivo que faz a conexão com o banco,
// busca os contatos ($usuarios) e trata ações como delete
include_once "config/process.php";

// Inclui o cabeçalho do site (HTML inicial, CSS, Bootstrap, etc)
include_once "templates/header.php";
?>

<!--
Verifica se existe uma mensagem de status salva na sessão
Normalmente usada para exibir sucesso após cadastrar, atualizar ou excluir
-->
<?php if (isset($_SESSION["status"])): ?>

    <div class="alert-success">
        <?php
        // Exibe a mensagem armazenada na sessão
        echo $_SESSION["status"];

        // Remove a mensagem da sessão para não aparecer novamente ao recarregar a página
        unset($_SESSION["status"]);
        ?>
    </div>

<?php endif; ?>

<!-- Título principal da página -->
<div class="titulo">
    <h2 class="titulo-principal">AGENDA DE CONTATOS</h2>
</div>

<!--
Verifica se existem contatos cadastrados
count($usuarios) > 0 evita erros e garante que a tabela só aparece se houver dados
-->
<?php if (count($usuarios) > 0): ?>

    <main class="conteudo">
        <div class="container-principal">

            <!-- Tabela que lista todos os contatos -->
            <table class="table">
                <thead class="barra-principal">
                    <tr>
                        <th>#</th> <!-- ID do contato -->
                        <th>Nome</th> <!-- Nome do contato -->
                        <th></th> <!-- Espaçamento -->
                        <th>Telefone</th> <!-- Telefone do contato -->
                        <th></th> <!-- Espaçamento -->
                        <th></th> <!-- Ações -->
                    </tr>
                </thead>

                <!--
                Percorre o array $usuarios e exibe cada contato em uma linha da tabela
                -->
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?= $usuario["id"]; ?></td>
                        <td><?= $usuario["nome"]; ?></td>
                        <td></td>
                        <td><?= $usuario["telefone"]; ?></td>
                        <td></td>

                        <!-- Ícones de ações: visualizar, editar e excluir -->
                        <td class="icon-atualizar">
                            <!-- Visualizar contato -->
                            <a href="show.php?id=<?= $usuario["id"]; ?>">
                                <ion-icon style="color:green" name="eye"></ion-icon>
                            </a>

                            <!-- Editar contato -->
                            <a href="edit.php?id=<?= $usuario["id"]; ?>">
                                <ion-icon style="color:blue" name="pencil-outline"></ion-icon>
                            </a>

                            <!-- Excluir contato -->
                            <!-- delete=true informa ao process.php que é uma ação de exclusão -->
                            <a href="config/process.php?delete=true&id=<?= $usuario["id"]; ?>">
                                <ion-icon style="color:red" name="remove-circle-outline"></ion-icon>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </table>
        </div>
    </main>

<?php else: ?>

    <!-- Mensagem exibida quando não há contatos cadastrados -->
    <h3>
        Ainda não há contatos na sua agenda,
        <a href="create.php">clique aqui para adicionar um contato</a>
    </h3>

<?php endif; ?>
