<?php
	require '../server/conectar.php';

	//recupera valores e cadastra despesa
	if(isset($_POST['lancarDespesa'])) {

		$data = '';
		$id_grupo = '';
		$descricao = '';
		$valor = 0;

		$n = count($_POST['data']);	
	
		for($a = $n; $a >= 1; $a--) {

			foreach($_POST as $chave => $valor) {
				if($chave == 'data')
					$data = $_POST[$chave][$a];
	
				if($chave == 'grupoDespesa') 
					$id_grupo = $_POST[$chave][$a];
	
				if($chave == 'descricao')
					$descricao = $_POST[$chave][$a];
			
				if($chave == 'quantia')
					$quantia = (intval($_POST[$chave][$a]) * -1); 
			} 
			$sql = $con->prepare("INSERT INTO lancamentos (id_grupo, data, descricao, valor) VALUES ('$id_grupo', '$data', '$descricao', '$quantia')");
			$sql->execute();
		}
	}

	if(isset($_POST['lancarReceita'])) {

		$data = '';
		$id_grupo = '';
		$descricao = '';
		$valor = 0;

		$n = count($_POST['data']);	
	
		for($a = $n; $a >= 1; $a--) {

			foreach($_POST as $chave => $valor) {
				if($chave == 'data')
					$data = $_POST[$chave][$a];
	
				if($chave == 'grupoReceita') 
					$id_grupo = $_POST[$chave][$a];
	
				if($chave == 'descricao')
					$descricao = $_POST[$chave][$a];
			
				if($chave == 'quantia')
					$quantia = intval($_POST[$chave][$a]); 
			} 
			$sql = $con->prepare("INSERT INTO lancamentos (id_grupo, data, descricao, valor) VALUES ('$id_grupo', '$data', '$descricao', '$quantia')");
			$sql->execute();
		} 
	}

	echo 'Lançamentos realizados com sucesso. Pode fechar esta janela.';