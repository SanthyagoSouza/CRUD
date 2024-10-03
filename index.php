<?php

$pdo = new PDO('mysql:host=localhost;dbname=pd_bd_jc145', 'root', '');
//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//insert.


if (isset($_GET ["delete"])) {
    $id = (int)$_GET['delete'];
    $pdo->exec("DELETE FROM cliente WHERE idcliente=$id"); 
    echo"Deletado com sucesso";
}

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

<?php

$sql = $pdo->prepare("SELECT * FROM cliente");
$sql->execute();

$fetchClientes = $sql-> fetchAll();

foreach ($fetchClientes as $key => $value) {
    echo '<a href=?delete='.$value['idcliente'] ."'>(x)</a>" .$value ["nome"] ."|". $value["sobrenome"] ."|". $value["telefone"] ;
    echo"<hr>";
}

?>