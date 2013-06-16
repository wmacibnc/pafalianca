<html>
<head>
	<title></title>
</head>
<body>

<?php
// Banco de dados retirar daqui
$conn = @mysql_connect("localhost", "root", "") or die ("Problemas na conexão."); 
$db = @mysql_select_db("pafalianca", $conn) or die ("Problemas na conexão");   

// Retirando os warning
error_reporting(E_ALL & ~ E_NOTICE);

// Recupera os dados dos campos 
$pergunta = $_POST['pergunta'];
$resposta = $_POST['resposta'];
$ordem = $_POST['ordem'];


   // Insere os dados no banco 
    $query = <<<QUERY
    INSERT INTO duvidas(pergunta,resposta, ordem)
      VALUES ('$pergunta','$resposta','$ordem')
QUERY;
mysql_query($query);

echo "Você foi cadastrado com sucesso."; 

// Seleciona todos convenios
$sql = mysql_query("SELECT * FROM duvidas ORDER BY ordem");

// Exibe as informações de cada 
while ($duvida = mysql_fetch_object($sql)) { 

// Exibimos os dados
echo "pergunta: " . $duvida->pergunta . "";echo "</br>" ;
echo "resposta: " . $duvida->resposta . "";echo "</br>" ; 
echo "ordem: " . $duvida->ordem . "";echo "</br>" ; 
} 
?>
</body>
</html>