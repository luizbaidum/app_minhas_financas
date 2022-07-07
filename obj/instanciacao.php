<?php
	
	require '../obj/classes.php';

	//recupera valores e cadastra grupo
	if(isset($_POST['cadastrarGrupo'])) {

		if($_POST['nomeGrupo'] == "" || !$_POST['opcaoGrupo']) {

			header('Location: ../index.php?falta_campo=falta');

			exit;
		}

		$grupo = new Grupo();

		$grupo->setTipo_grupo($_POST['opcaoGrupo']);

		$grupo->setNome_grupo($_POST['nomeGrupo']);

		$_SESSION['grupo'] = $grupo;

		header('Location: ../sql/lancamentos.php');
	}

	//recupera valores e cadastra despesa
	if(isset($_POST['lancarDespesa'])) {

		if($_POST['grupoDespesa'] === 'null') {

			header('Location: ../index.php?falta_campo=faltaD');

			exit;
		}

		$despesa = new Despesa();
		
		$despesa->setId_grupo($_POST['grupoDespesa']);

		$despesa->setData($_POST['data']);

		$despesa->setDescricao($_POST['descricao']);

		$despesa->setValor($_POST['valor']);

		$_SESSION['despesa'] = $despesa;

		header('Location: ../sql/lancamentos.php');
	}

	//recupera valores e cadastra receita

	if(isset($_POST['lancarReceita'])) {

		if($_POST['grupoReceita'] === 'null') {

			header('Location: ../index.php?falta_campo=faltaR');

			exit;
		}
		
		$receita = new Receita();

		$receita->setId_grupo($_POST['grupoReceita']);

		$receita->setData($_POST['data']);

		$receita->setDescricao($_POST['descricao']);

		$receita->setValor($_POST['valor']);

		$_SESSION['receita'] = $receita;

		header('Location: ../sql/lancamentos.php');
	}
 