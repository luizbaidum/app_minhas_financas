<form method="post" action="../obj/instanciacao_lote.php">
				
	<input type="date" name="data" required>

	<input type="text" name="descricao" placeholder="Descrição breve" required>

	<?php 
		require 'recuperaLancamentos.php';

		echo "<select name=grupoDespesa>";

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