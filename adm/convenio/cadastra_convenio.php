<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta name="description" content="PAF Aliança - Goiás GO/ Distrito Federal DF"/>
<meta name="keywords" content="PAF, Aliança, Plano Funerário, Serviço Funerário, convênios"/>
<meta name="robots" content="index, follow">
<meta name="author" content="Mister W Informática">
 
<title>.: PAF Aliança :. Home </title>
<link rel="stylesheet" type="text/css" href="adm/estilo.css">
</head>
<body>
	<form method="post" action="salva_convenio.php" enctype="multipart/form-data">

		<label>Categoria: </label>
		<select name="categoria_id">
			<option value="1">Teste 1</option>
			<option value="2">Teste 2</option>
		</select>

			<label>Nome: </label>		
			<input type="text" name="nome" id="nome"/><br/>

			<label>Telefone: </label>		
			<input type="text" name="telefone" id="telefone"/><br/>

			<label>E-mail: </label>		
			<input type="text" name="email" id="email"/><br/>

			<label>Resumo: </label>		
			<input type="text" name="resumo" id="resumo"/><br/>

			<label>Logo: </label>		
			<input type="file" name="logo" id="logo"/>

			<label>Slogan: </label>		
			<input type="text" name="slogan" id="slogan"/><br/>

			<label>Descontos: </label>		
			<input type="text" name="desconto" id="desconto"/><br/>

			<label>Serviços: </label>		
			<input type="text" name="servico" id="servico"/><br/>

			<label>CEP: </label>		
			<input type="text" name="cep" id="cep"/><br/>

			<label>Endereço: </label>		
			<input type="text" name="endereco" id="endereco"/><br/>

			<label>Bairro: </label>		
			<input type="text" name="bairro" id="bairro"/><br/>

			<label>Cidade: </label>		
			<input type="text" name="cidade" id="cidade"/><br/>

			<label>UF: </label>		
			<input type="text" name="uf" id="uf"/><br/>			

			<label>Observacao: </label>		
			<input type="text" name="observacao" id="observacao"/><br/>						

			<input type="submit" value="Enviar" />
	</form>
</body>
</html>
