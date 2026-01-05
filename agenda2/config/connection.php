<?php 

//Configurações de infraestrutura do banco de dados 

$host = "localhost";
$dbname = "agenda";
$user = "root";
$pass = "";

//Tenta estabelecer conexão via PDO (PHP Data Objects).

try {  
    // Inicializa a instância de conexão com o driver MySQL
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);   //O uso do try-catch é indispensável para evitar que credenciais 

    // Habilita o lançamento de exceções para erros de SQL. 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    // Tratamento de exceção: captura falhas de autenticação ou host offline
    $error = $e->getMessage();
    
    // Log do erro (em produção, o ideal é salvar em arquivo e não dar echo)
    echo "Erro de Conexão: " . $error;
}

?>

































