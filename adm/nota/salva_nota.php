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
$nome = $_POST['nome'];
$dataFalecimento = $_POST['dataFalecimento'];
$localFalecimento = $_POST['localFalecimento'];
$idade = $_POST['idade'];
$dataSepultamento = $_POST['dataSepultamento'];
$localSepultamento = $_POST['localSepultamento'];
$local = $_POST['local'];
$data = $_POST['data'];

   // Insere os dados no banco 
    $query = <<<QUERY
    INSERT INTO nota (nome, dataFalecimento, localFalecimento, idade, dataSepultamento, localSepultamento,local, data)
              VALUES ('$nome','$dataFalecimento', '$localFalecimento', '$idade', '$dataSepultamento', '$localSepultamento', '$local', '$data')
QUERY;
echo $query;
mysql_query($query);


   // Se os dados forem inseridos com sucesso 
    echo "Você foi cadastrado com sucesso."; 


 
// Seleciona todos convenios
$sql = mysql_query("SELECT * FROM nota ORDER BY nome");

// Exibe as informações de cada 
while ($nota = mysql_fetch_object($sql)) { 

// Exibimos os dados
echo "Nome: " . $nota->nome . "";echo "</br>" ;
echo "Data de Falecimento: " . $nota->dataFalecimento . "";echo "</br>" ;
echo "Local de Falecimento: " . $nota->localFalecimento . "";echo "</br>" ;
echo "Idade: " . $nota->idade . "";echo "</br>" ;
echo "Data de Sepultamento: " . $nota->dataSepultamento . "";echo "</br>" ;
echo "Local de Sepultamento: " . $nota->localSepultamento . "";echo "</br>" ;
echo "Local: " . $nota->local . "";echo "</br>" ;
echo "Data: " . $nota->data . "";echo "</br>" ;

} 
?>
</body>
</html>