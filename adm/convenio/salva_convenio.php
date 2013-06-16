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
$categoria_id = $_POST['categoria_id'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$resumo = $_POST['resumo'];
$slogan = $_POST['slogan'];
$desconto = $_POST['desconto'];
$servico = $_POST['servico'];
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];
$observacao = $_POST['observacao'];

// Imagem Logo
$logo = $_FILES["logo"];

// Se a imagem estiver sido selecionada 
if (!empty($logo["name"])) {   

// Largura máxima em pixels 
$largura = 1000; 
// Altura máxima em pixels 
$altura = 1000; 
// Tamanho máximo do arquivo em bytes 
$tamanho = 5000000; 

$error;
// Verifica se o arquivo é uma imagem 
if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $logo["type"])){ 
$error[1] = "Isso não é uma imagem."; 
}   
// Pega as dimensões da imagem 
$dimensoes = getimagesize($logo["tmp_name"]);   
// Verifica se a largura da imagem é maior que a largura permitida 
if($dimensoes[0] > $largura) { 
$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
 }   
 // Verifica se a altura da imagem é maior que a altura permitida 
 if($dimensoes[1] > $altura) { 
 $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
  }   
  // Verifica se o tamanho da imagem é maior que o tamanho permitido 
  if($logo["size"] > $tamanho) { $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
   }   
   // Se não houver nenhum erro 
   if (count($error) == 0) {   
   // Pega extensão da imagem 
   preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $logo["name"], $ext);   
   // Gera um nome único para a imagem 
   $nome_imagem = md5(uniqid(time())) . "." . $ext[1];   
   // Caminho de onde ficará a imagem 
   $caminho_imagem = "../uploads/convenio/" . $nome_imagem;   
   // Faz o upload da imagem para seu respectivo caminho 
   move_uploaded_file($logo["tmp_name"], $caminho_imagem);  

   // Insere os dados no banco 
    $query = <<<QUERY
    INSERT INTO convenio(nome, telefone, email, resumo, logo, slogan, desconto, servico, cep, endereco, bairro, cidade, uf, observacao)
      VALUES ('$nome','$telefone','$email','$resumo','$nome_imagem','$slogan','$desconto','$servico','$cep','$endereco','$bairro','$cidade','$uf','$observacao')
QUERY;
mysql_query($query);
$nao_continuar = 0;
   // Se os dados forem inseridos com sucesso 
   if ($nao_continuar == 0){ 
    echo "Você foi cadastrado com sucesso."; 
    } 
   }   

   // Se houver mensagens de erro, exibe-as 
   if (count($error) != 0) { 
   	foreach ($error as $erro) { 
   		echo $erro . ""; 
   	} 
   } 
} 
// Seleciona todos convenios
$sql = mysql_query("SELECT * FROM convenio ORDER BY nome");

// Exibe as informações de cada 
while ($convenio = mysql_fetch_object($sql)) { 

// Exibimos a Logo
echo "<img src='../uploads/convenio/".$convenio->logo."'/> </br>";

// Exibimos o nome 
echo "Nome: " . $convenio->nome . "";echo "</br>" ;
echo "resumo: " . $convenio->resumo . "";echo "</br>" ; 
echo "logo: " . $convenio->logo . "";echo "</br>" ; 
echo "slogan: " . $convenio->slogan . "";echo "</br>" ; 
echo "desconto: " . $convenio->desconto . "";echo "</br>" ; 
echo "servico: " . $convenio->servico . "";echo "</br>" ; 
echo "endereco: " . $convenio->endereco . "";echo "</br>" ; 
echo "cep: " . $convenio->cep . "";echo "</br>" ; 
echo "bairro: " . $convenio->bairro . "";echo "</br>" ; 
echo "cidade: " . $convenio->cidade . "";echo "</br>" ; 
echo "cuf: " . $convenio->uf . "";echo "</br>" ; 
echo "email: " . $convenio->email . "";echo "</br>" ; 
echo "telefone: " . $convenio->telefone . "";echo "</br>" ; 
echo "observacao: " . $convenio->observacao . "";echo "</br>" ; 

echo "Cadastrado: " . $convenio->data_hora_cadastro = date('d/m/Y') . "";echo "</br>" ; 
} 
?>
</body>
</html>