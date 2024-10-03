<?php

$pdo = new PDO('mysql:host=localhost;dbname=pd_bd_jc145', 'root', '');
//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//insert.
if (isset($_POST ["nome"])) {  
    
    $sql = $pdo-> prepare("INSERT INTO cliente (nome, sobrenome, telefone) VALUES (?,?,?)");
    
    $sql->execute(array($_POST["nome"], $_POST["sobrenome"], $_POST["telefone"]));
    echo"Inserido com sucesso";
}


?>

<form action="" method="post">
    <label for="">nome</label>
<input type="text" name="nome">
<label for="">sobrenome</label>
<input type="text" name="sobrenome">
<label for="">telefone</label>
<input type="text" name="telefone">
<input type="submit" name="enviar">

</form>