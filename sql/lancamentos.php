<?php 

require '../server - protejer/conectar.php';

include '../obj/instanciacao.php';

	if($_SESSION['grupo']) {

		$grupo = $_SESSION['grupo'];

		$tipo = $grupo->getTipo_grupo();
		$nome = $grupo->getNome_grupo();

		//insert in tabela grupos
		$sql = $con->prepare("INSERT INTO grupos (nome_grupo, tipo_grupo) VALUES ('$nome', '$tipo')");

		$sql->execute();

		session_destroy();

		if($sql) {

			header('Location: http://localhost/app_minhas_financas/index.php');
		} 

	} else if($_SESSION['despesa']) {

		$despesa = $_SESSION['despesa'];

		$id_grupo = $despesa->getId_grupo();
		$data = $despesa->getData();
		$descricao = $despesa->getDescricao();
		$valor = $despesa->getValor();

		$sql = $con->prepare("INSERT INTO lancamentos (id_grupo, data, descricao, valor) VALUES ('$id_grupo', '$data', '$descricao', '$valor')");

		$sql->execute();

		session_destroy();

		if($sql) {

			header('Location: http://localhost/app_minhas_financas/index.php');
		}

	} else if($_SESSION['receita']) {

		$receita = $_SESSION['receita'];

		$id_grupo = $receita->getId_grupo();
		$data = $receita->getData();
		$descricao = $receita->getDescricao();
		$valor = $receita->getValor();

		$sql = $con->prepare("INSERT INTO lancamentos (id_grupo, data, descricao, valor) VALUES ('$id_grupo', '$data', '$descricao', '$valor')");

		$sql->execute();

		session_destroy();

		if($sql) {

			header('Location: http://localhost/app_minhas_financas/index.php');
		} 
	}