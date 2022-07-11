<?php

require_once('../server/conectar.php');

if(isset($_GET['cancelar'])) {
    header('location: ../index.php');
};

if(isset($_GET['delete'])) {

    $item = $_GET['delete'];

    $sql = $con->prepare("DELETE FROM lancamentos WHERE lancamentos.id_lancamento = '$item'");

    $sql->execute();    

    header('location: ../index.php');
}

if(isset($_GET['update'])) {

    $item = $_GET['update'];

    $retorno = $con->prepare("
        SELECT id_lancamento, data, descricao, valor, lancamentos.id_grupo, grupos.nome_grupo 
        FROM lancamentos 
        INNER JOIN grupos ON lancamentos.id_grupo = grupos.id_grupo 
        WHERE lancamentos.id_lancamento = '$item';
    ");

    $retorno->execute();

    $resultado = $retorno->fetch(); }
?>

    <form method="post" action="../obj/instanciacao.php">
        <span style="border: 1px solid black; padding: 2px">ID lançamento: <?= $resultado['id_lancamento']; ?></span>
        <input type="hidden" value="<?= $resultado['id_lancamento'] ?>" name="id_lancamento">
				
		<input type="date" name="data" value="<?= $resultado['data']; ?>" required>

		<input type="text" name="descricao" value="<?= $resultado['descricao']; ?>" required>

<?php   require 'recuperaLancamentos.php';

        if($resultado['valor'] < '0') {

            echo "<select name=grupoDespesa>";

					while($linha = $retorno_despesas->fetch(PDO::FETCH_OBJ))
					{	
                        if($linha->nome_grupo === $resultado['nome_grupo']) {

                            echo '<option value='.$resultado['id_grupo'].' selected>'.$resultado['nome_grupo'].'</option>';
         
                        } else {

                            echo '<option value='.$linha->id_grupo.'>'.$linha->nome_grupo.'</option>';
                        }
					};
				echo "</select>";

            echo '<input type="hidden" name="RouD" value="D">';       

        } else {

            echo "<select name=grupoReceita>";

					while($linha = $retorno_receitas->fetch(PDO::FETCH_OBJ))
					{	
                        if($linha->nome_grupo === $resultado['nome_grupo']) {

                            echo '<option value='.$resultado['id_grupo'].' selected>'.$resultado['nome_grupo'].'</option>';
         
                        } else {

                            echo '<option value='.$linha->id_grupo.'>'.$linha->nome_grupo.'</option>';
                        }
					};
				echo "</select>";

            echo '<input type="hidden" name="RouD" value="R">';   
        }		 
?>
		<input type="number" min="0.00" max="10000.00" step="0.01" name="valor" value="<?= $resultado['valor']; ?>" required>

		<input type="submit" name="operacao" value="Atualizar">
	</form>