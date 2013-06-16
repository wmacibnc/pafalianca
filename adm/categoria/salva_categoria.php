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
$imagem = $_FILES["imagem"];

// Se a imagem estiver sido selecionada 
if (!empty($imagem["name"])) {   

// Largura máxima em pixels 
$largura = 1000; 
// Altura máxima em pixels 
$altura = 1000; 
// Tamanho máximo do arquivo em bytes 
$tamanho = 5000000; 

$error;
// Verifica se o arquivo é uma imagem 
if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $imagem["type"])){ 
$error[1] = "Isso não é uma imagem."; 
}   
// Pega as dimensões da imagem 
$dimensoes = getimagesize($imagem["tmp_name"]);   
// Verifica se a largura da imagem é maior que a largura permitida 
if($dimensoes[0] > $largura) { 
$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
 }   
 // Verifica se a altura da imagem é maior que a altura permitida 
 if($dimensoes[1] > $altura) { 
 $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
  }   
  // Verifica se o tamanho da imagem é maior que o tamanho permitido 
  if($imagem["size"] > $tamanho) { $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
   }   
   // Se não houver nenhum erro 
   if (count($error) == 0) {   
   // Pega extensão da imagem 
   preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);   
   // Gera um nome único para a imagem 
   $nome_imagem = md5(uniqid(time())) . "." . $ext[1];   
   // Caminho de onde ficará a imagem 
   $caminho_imagem = "../uploads/categoria/" . $nome_imagem;   
   // Faz o upload da imagem para seu respectivo caminho 
   move_uploaded_file($imagem["tmp_name"], $caminho_imagem);   
   // Insere os dados no banco 
   $sql = mysql_query("INSERT INTO categoria VALUES ('', '".$nome."','".$nome_imagem."')");   
   // Se os dados forem inseridos com sucesso 
   if ($sql){ echo "Você foi cadastrado com sucesso."; 
   } 
   }   
   // Se houver mensagens de erro, exibe-as 
   if (count($error) != 0) { 
   	foreach ($error as $erro) { 
   		echo $erro . ""; 
   	} 
   } 
} 
// Seleciona todas as categorias
$sql = mysql_query("SELECT * FROM categoria ORDER BY nome");

// Exibe as informações de cada usuário 
while ($categoria = mysql_fetch_object($sql)) { 
// Exibimos a foto 
echo "<img src='../uploads/categoria/".$categoria->imagem."'/> </br>";

// Exibimos o nome 
echo "Nome: " . $categoria->nome . ""; 
} 
?>
</body>
</html>