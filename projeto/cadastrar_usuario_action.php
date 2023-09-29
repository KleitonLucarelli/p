<?php
    try {
        // conectar ao banco de dados
        $host='localhost';
        $db = 'banco';
        $username = 'root';
        $password = '';
        $dbh = new PDO('mysql:host='.$host.';dbname='.$db.'', $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // preparar comando de INSERT
        $stmt = $dbh->prepare("insert into usuario (login,senha) values (?,?);");
        
        // substituir os ? pelo dados digitados pelo usuário
        $stmt->bindParam(1, $_POST["login"]); // "login" é o nome do campo no FORM
        $stmt->bindParam(2, $_POST["senha"]); // "senha" é o nome do campo no FORM
        		
        // executar comando SQL
        if($stmt->execute()) {
            echo "Cadastro realizado com sucesso!";
        }
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage();
        die();
    }
?>  