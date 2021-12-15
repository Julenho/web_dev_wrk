<HTML>
<HEAD>
<TITLE>Comentários</TITLE>
</HEAD>
<BODY>
<h2>Comentários</h3>
<?php
$link=mysql_connect("localhost",'julio','4567');
$banco=mysql_select_db("bdcomentarios");
?>

<form name="form" method="post" action="arquivo.php">
    Nome:
    <input type=text name=nome>
    <br><br>E-Mail:
    <input type=text name=email>
    <br><br>Mensagem:<br>
    <textarea name=comentario></textarea>
    <br><br>
    <input type=submit value=Enviar>
    <input type=reset value=Limpar>
</form>
<hr>

<?php
############################
$nome=$_POST['nome'];
$email=$_POST['email'];
$comentario=$_POST['comentario'];
$pagina='dango';
  
if(strlen($_POST['nome'])) #insere somente se no form foi escrito o nome
{
    $insert = mysql_query("INSERT INTO tbcomentarios(nome,email,pagina,comentario) 
    values('$nome','$email','$pagina','$comentario')");
}
    ###########
    
    
$sql = "SELECT * FROM tbcomentarios WHERE pagina='dango' ORDER BY id desc";
$executar=mysql_query($sql);
while( $exibir = mysql_fetch_array($executar)){
    echo $exibir['nome'];
    echo "</br>";
    echo $exibir['email'];
    echo "</br>";
    echo $exibir['comentario'];
    echo "</br><hr>";
}
?>
</BODY>
</HTML>
