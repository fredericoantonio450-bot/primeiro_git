<?php 

session_start(); // Inicie a sessão no topo do arquivo
include_once "connection.php"; /// 


$id;
if(!empty($_GET["id"]) ){

    $id = $_GET["id"];

}

// NOVO BLOCO: BUSCA DE TODOS OS CONTATOS (Listagem)
    if(!empty($id) ){
    
    $contacts = "SELECT * FROM contatos WHERE id = :id";

    $sql = $conn->prepare($contacts);

    $sql->bindParam(":id", $id);
    
    // query 
    $sql->execute();

    $usuario = $sql->fetch(PDO::FETCH_ASSOC); // fetch é usado apenas Select 


} else{
     $usuarios = [];

     $contacts = "SELECT * FROM contatos";

     $sql = $conn->prepare($contacts);

     $sql->execute();

     $usuarios = $sql->fetchAll(PDO::FETCH_ASSOC); // fetchAll usado para selecionar todos os contatos

}

// OPERAÇÃO DE DELEATR (DELETE) ---------------
if (isset($_GET["delete"]) && $_GET["delete"] === "true") {

    $id = $_GET["id"] ?? null;

        // Validar ID
    if (is_numeric($id) && $id > 0) {

        $sql = $conn->prepare("DELETE FROM contatos WHERE id = :id");

        $sql->bindParam(":id", $id, PDO::PARAM_INT);

        if ($sql->execute()) {
            // Define a mensagem na sessão
            $_SESSION["status"] = "<p style= color:red; >cadastro deletado com sucesso!</p>"; // mensagem de dados delete

            header("Location: ../index.php?deleted=true");
            exit;
        } 
    }
}

/// OPERAÇÃO DE ATUALIZAÇÃO (UPDATE) ---------------

$requestData = $_POST;

// Se não for ação de update, não executa nada
if (isset($requestData["atualizar"]) && $requestData["atualizar"] == "update") {
    
// Validação dos campos
    if (isset($requestData["id"]) || isset($requestData["nome"]) || isset($requestData["telefone"]) || isset($requestData["observacao"])) {
    
        $id = $requestData["id"];
        $nome = $requestData["nome"];
        $telefone = $requestData["telefone"];
        $observacao = $requestData["observacao"];

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            // Validação dos campos
            $update_Insert = "UPDATE contatos SET nome = :nome, telefone = :telefone, observacao = :observacao WHERE id = :id";

            $stmt = $conn->prepare($update_Insert);

            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":telefone", $telefone);
            $stmt->bindParam(":observacao", $observacao);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            // Executa
            if ($stmt->execute()) {
                // Define a mensagem na sessão
                $_SESSION["status"] = "<p>Cadastro atualizado com sucesso</p>"; // mensagem de dados delete

                header("Location: ../index.php?status=success");
                exit;
                } 
         }
    }
}

// OPERACÃO DE CRIAÇÃO (CREATE) --------------- 
$data = $_POST;

if(isset($data["formulario"]) && $data["formulario"] === "cadastrar"){
    
    $nome = $data["nome"];
    $telefone = $data["telefone"];
    $observacao = $data["observacao"] ;

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $contacts_Insert = "INSERT INTO contatos(nome, telefone, observacao) VALUES(:nome, :telefone, :observacao)";

            $stmt = $conn->prepare($contacts_Insert);

            /// instrução preparada do PDO
            $stmt->bindParam(":nome", $nome, PDO::PARAM_STR); /// // Uso de constantes PDO::PARAM_STR para garantir o tratamento correto de strings
            $stmt->bindParam(":telefone", $telefone, PDO::PARAM_STR);
            $stmt->bindParam(":observacao", $observacao, PDO::PARAM_STR);

            /// Executar a declaração preparada
        
                if($stmt->execute()){ 

                    // Define a mensagem na sessão
                    $_SESSION["status"] = "<p style: color=green; >Cadastro realizado com sucesso</p>"; // mensagem de dados cadastrados

                    header("Location: http://localhost/agenda2/index.php?create=true"); 
                    exit;
                }   
        }       
}

/// Lógica de atualizar o contato

$resquesData = $_GET;
if(isset($resquesData["secreto"]) && $resquesData["secreto"] == "valor_secreto"){

    // Verificamos apenas o "nome", que é o que será usado no filtro do SELECT
    if(isset($resquesData["nome"])){

        $nome = $resquesData["nome"];
        $query = "SELECT nome, telefone, observacao FROM contatos WHERE nome = :nome";
        
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);

        if($stmt->execute()){
            //Pegando o resultado ANTES de qualquer redirecionamento
            $contato = $stmt->fetch(PDO::FETCH_ASSOC);

            if($contato){

                // Salva os dados do contato para preencher o formulário de edição
                $_SESSION["dados_contato"] = $contato; 
                $_SESSION["status"] = "contato encontrado";

                header("Location: index.php?create=true&edit=true");
                exit();
            }        
        }
    }
}

?>



