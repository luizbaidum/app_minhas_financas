<html>
	<head>
		<meta charset="utf-8">
		<title>Minhas finanças</title>

		<link rel="stylesheet" href="CSS/normalize.css">
		<link rel="stylesheet" href="CSS/estilo.css">
	</head>
		
	<body>

		<header class="menu">
			<div class="titulo-pagina">App Minhas Finanças</div>
		</header>

		<section>

			<span class="titulo-section">Cadastrar tipo de receita ou despesa</span>

			<form method="post" action="obj/instanciacao.php">

				<input type="radio" name="opcaoGrupo" value="receita">
				<label for="html">Cadastrar como Tipo de Receita</label><br>
				<input type="radio" name="opcaoGrupo" value="despesa">
				<label for="css">Cadastrar como Tipo de Despesa</label><br>

				<input type="text" name="nomeGrupo"  placeholder="Nome" required>

				<input type="submit" name="cadastrarGrupo" value="Cadastrar">
			</form>

			<button onclick='popupTipo()'>Lançar em lote</button>

			<button onclick='reloadpg()'>Atualizar listagem de tipos</button>
			<?php if(isset($_GET['falta_campo']) && $_GET['falta_campo'] == 'falta') {

				echo '<span class="red">Certifique-se de ter selecionado se Receita ou Despesa</span>';
			} ?>
		</section>	

		<section>

			<span class="titulo-section">Lançar receita ou despesa</span>

			<div>Despesas</div>

			<form method="post" action="obj/instanciacao.php">
				
				<input type="date" name="data" required>

				<input type="text" name="descricao" placeholder="Descrição breve" required>

				<?php 
					require 'sql/recuperaLancamentos.php';

					if(isset($_GET['falta_campo']) && $_GET['falta_campo'] == 'faltaD') {

						echo "<select name=grupoDespesa style='border: 2px solid red'>";

					} else {echo "<select name=grupoDespesa>";}

					echo "<option value='null'>Selecione</option>";
						while($linha = $retorno_despesas->fetch(PDO::FETCH_OBJ))
						{	
							echo '<option value='.$linha->id_grupo.'>'.$linha->nome_grupo.'</option>';
						};
					echo "</select>";
				?>

				<input type="number" min="0.00" max="10000.00" step="0.01" name="valor" placeholder="Valor" required>

				<input type="submit" name="lancarDespesa" value="Lançar despesa">
			</form>
			<button onclick='popupDespesasLote()'>Lançar em lote</button>

			<div>Receitas</div>

			<form method="post" action="obj/instanciacao.php">
				
				<input type="date" name="data" required>

				<input type="text" name="descricao" placeholder="Descrição breve" required>

				<?php 
					require 'sql/recuperaLancamentos.php';

					if(isset($_GET['falta_campo']) && $_GET['falta_campo'] == 'faltaR') {

						echo "<select name=grupoReceita style='border: 2px solid red'>";

					} else {echo "<select name=grupoReceita>";}

					echo "<option value='null'>Selecione</option>";
						while($linha = $retorno_receitas->fetch(PDO::FETCH_OBJ))
						{	
							echo '<option value='.$linha->id_grupo.'>'.$linha->nome_grupo.'</option>';
						};
					echo "</select>";
				?>

				<input type="number" min="0.00" max="10000.00" step="0.01" name="valor" placeholder="Valor" required>

				<input type="submit" name="lancarReceita" value="Lançar receita">
			</form>
			
			<button onclick='popupReceitasLote()'>Lançar em lote</button>
		</section>

		<?php require_once('tabela.php'); ?>
		
	</body>

	<script>
		function popupTipo()
		{
			let popUp = window.open('sql/tipo_lote.php', 
			'popup',
			"width=600, height=600, top=150, left=700, scrollbars=yes");
		}

		function popupDespesasLote()
		{
			let popUp = window.open('sql/despesas_lote.php?numero=0', 
			'popup',
			"width=900, height=600, top=150, left=500, scrollbars=yes");
		}

		function popupReceitasLote()
		{
			let popUp = window.open('sql/receitas_lote.php?numero=0', 
			'popup',
			"width=900, height=600, top=150, left=500, scrollbars=yes");
		}

		function reloadpg()
		{
			location.reload();
		}
	</script>
</html>
//PAGINAÇÃO NA TABELA (quando ficar grande)

//FAZER UPDATES