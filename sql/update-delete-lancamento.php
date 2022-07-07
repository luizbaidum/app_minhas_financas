<?php

require_once('../server - protejer/conectar.php');

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

    $resultado = $retorno->fetch();
?>

    <form method="post" action="obj/instanciacao.php">
        <span style="border: 1px solid black; padding: 2px">ID lançamento: <?= $resultado['id_lancamento']; ?></span>
				
		<input type="date" name="data" value="<?= $resultado['data']; ?>" required>

		<input type="text" name="descricao" value="<?= $resultado['descricao']; ?>" required>

			<?php

                require 'recuperaLancamentos.php';
					
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
			?>

		<input type="number" min="0.00" max="10000.00" step="0.01" name="valor" value="<?= $resultado['valor']; ?>" required>

		<input type="submit" name="lancarReceita" value="Atualizar">
	</form>

    //FAZER VALER PARA RECEITAS E DESPESAS (por enquanto estou puxando apenas receiras)
    //FAZER O INSERT UPDATE
    //DEFINIR EM QUAL PAGINA E FORMATO AS EDIÇÕES IRÃO APARECER
    //ADICIONAR CONFIRMAÇÃO PRÉ-EXCLUSÃO
    <?php
}    