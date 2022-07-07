<section>

<span class="titulo-section">Escolha o que exibir</span>

<form>
    <?php include 'sql/recuperaLancamentos.php'?>

    <div>
        <button type="submit" name="lancamentos_despesas" value="<?php $lancamentos_despesas ?>">Despesas</button>
        <button type="submit" name="lancamentos_receitas" value="<?php $lancamentos_receitas ?>">Receitas</button>
        <button type="submit" name="lancamentos_todos" value="<?php $lancamentos_todos ?>">Todos</button>
    </div>
</form>

<?php
    $key = '';
    foreach ($_GET as $key => $value) {
        $key;
    }
?>

<table>
<tr class="table-header">
    <td>Data</td>
    <td>Grupo</td>
    <td>Descrição</td>
    <td>Valor</td>
    <td>Alterar</td>
    <td>Excluir</td>
</tr>


<?php 
    $somatoria = 0;

    if($key === 'lancamentos_todos') {

            while($linha = $lancamentos_todos->fetch(PDO::FETCH_OBJ)) {

            echo '<tr>';
            echo '<td id="data">'. $linha->data .'</td>';
            echo '<td id="nome_grupo">'. $linha->nome_grupo .'</td>';
            echo '<td id="descricao">'. $linha->descricao .'</td>';
            echo '<td id="valor">'. $linha->valor .'</td>';
            echo '<td><button type="submit" name="update" value="'.$linha->id_lancamento.'"> Alterar </button></td>';
            echo '<td><button type="submit" name="delete" value="'.$linha->id_lancamento.'"> Excluir </button></td>';
            echo '</tr>';

            $somatoria = $linha->valor + $somatoria;
        }
    } else if ($key === 'lancamentos_receitas') {

        while($linha = $lancamentos_receitas->fetch(PDO::FETCH_OBJ)) {

            echo '<tr>';
            echo '<td id="data">'. $linha->data .'</td>';
            echo '<td id="nome_grupo">'. $linha->nome_grupo .'</td>';
            echo '<td id="descricao">'. $linha->descricao .'</td>';
            echo '<td id="valor">'. $linha->valor .'</td>';
            echo '<td><button type="submit" name="update" value="'.$linha->id_lancamento.'"> Alterar </button></td>';
            echo '<td><button type="submit" name="delete" value="'.$linha->id_lancamento.'"> Excluir </button></td>';
            echo '</tr>';

            $somatoria = $linha->valor + $somatoria;
        }
    } else if($key === 'lancamentos_despesas') {

        while($linha = $lancamentos_despesas->fetch(PDO::FETCH_OBJ)) {

            echo '<tr id="tr">';
            echo '<td class="data">'. $linha->data .'</td>';
            echo '<td id="nome_grupo">'. $linha->nome_grupo .'</td>';
            echo '<td id="descricao">'. $linha->descricao .'</td>';
            echo '<td id="valor">'. $linha->valor .'</td>';
            echo '<td><button type="submit" name="update" value="'.$linha->id_lancamento.'"> Alterar </button></td>';
            echo '<td><button type="submit" onclick="confirmarExclusao()" name="delete" value="'.$linha->id_lancamento.'"> Excluir </button></td>';
            echo '</tr>';

            $somatoria = $linha->valor + $somatoria;
        }
    } //APAGGUEI O FORM E O ACTION
?>


    <tr class="somatoria <?php if($somatoria>0) echo 'green'; else echo 'red'; ?>">
        <td colspan="4" style="text-align: right;">Resultado: <?php echo $somatoria; ?></td>
    </tr>
</table>

<div class="contador">
    Itens lançados:
<?php 

    if($key === 'lancamentos_todos') {

        $linha_contagem = $contar_todos->fetch(PDO::FETCH_ASSOC); echo $linha_contagem['COUNT(*)'];
    } else if ($key === 'lancamentos_receitas') {

        $linha_contagem = $contar_receitas->fetch(PDO::FETCH_ASSOC); echo $linha_contagem['COUNT(*)'];
    } else if ($key === 'lancamentos_despesas') {

        $linha_contagem = $contar_despesas->fetch(PDO::FETCH_ASSOC); echo $linha_contagem['COUNT(*)'];
    } ?>
</div>		
</section>