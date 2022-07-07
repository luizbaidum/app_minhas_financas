<?php require '../obj/classes.php'; require '../server/conectar.php' ?>

<header>
<link rel="stylesheet" href="../CSS/estilo_lote.css">
</header>

<h2>Cadastrar lançamentos de receitas</h2> <br>

<div class="botoes">

    <form action="inclui-campo-lancamentos.php">

        <input type="number" placeholder="Qtd. lançamentos" name="numero">

        <input type="hidden" value='receita' name="receita">
        <button type="submit">Adicionar</button> ou&nbsp;
    </form>

    <button type="button" onclick="destruir()">Remover linha</button>
</div>  

<span style="width: 300px; margin: 5px;">Linhas para lançamento: <span id="parte0"> </span></span>

<form method="post" action="../obj/instanciacao_lote.php">
    
    <div id="agrupamento" class="agrupamento">

        <div id="parte1" style="width: 320px; margin: 5px 0px;"> </div>

        <div class="grupo-receita" id="meio">
            <?php if(isset($_GET['numero'])) {

                if($_GET['numero'] > 9) {

                    echo "<div class='aviso'>NUMERO MÁXIMO DE LANÇAMENTOS PERMITIDOS POR VEZ: 9<br>Por favor, feche e abra a página novamente para efetuar os lançamentos.</div>";
                } else {
                    $numero = $_GET['numero'];

                    do {
                        require 'recuperaLancamentos.php';
                        echo "<select name=grupoReceita[$numero] id='options'>";
                        echo "<option value='null'>Selecione</option>";
                        while($linha = $retorno_receitas->fetch(PDO::FETCH_OBJ))
                            {	
                                echo '<option value='.$linha->id_grupo.'>'.$linha->nome_grupo.'</option>';
                            };
                        echo "</select>";
    
                        $numero--;
    
                    } while ($numero > 0); 
                } }
             ?>
        </div>
        <div id="parte2" style="width: 190px; margin: 5px 0px 5px 5px;"> </div>
    </div>

    <input type="submit" name="lancarReceita" value="Lançar receitas">
</form>

<script>
    var url = location.search;
    var qtd = url.substr(-1);

    let parte0 = document.getElementById("parte0");

    if (qtd == "0") {
        var valor = 0;
        parte0.innerHTML = valor;
        let agrupamento = document.getElementById("agrupamento");
        agrupamento.style = "display: none";
    } else {
        var valor = qtd;
        parte0.innerHTML = valor;
    }

    do {
        novosCampos();
        qtd--;
    } while (qtd>0);

    function novosCampos() 
    {
        let parte1 = document.getElementById("parte1");
        let parte2 = document.getElementById("parte2");
        let novo_data = document.createElement("input");
        let novo_descricao = document.createElement("input");
        let novo_valor = document.createElement("input");
        
        novo_data.type = "date";
        novo_data.name = "data["+qtd+"]";
        novo_data.style = "margin: 5px";
        novo_data.id = "iddata";
        parte1.appendChild(novo_data);

        novo_descricao.type = "text";
        novo_descricao.name = "descricao["+qtd+"]";
        novo_descricao.placeholder = "Descrição";
        novo_descricao.style = "margin: 5px";
        novo_descricao.id = "iddescricao";
        parte1.appendChild(novo_descricao);

        novo_valor.type = "number";
        novo_valor.name = "quantia["+qtd+"]";
        novo_valor.placeholder = "Valor";
        novo_valor.style = "margin: 5.099px";
        novo_valor.id = "idvalor";
        parte2.appendChild(novo_valor);
    }

    var valor2 = parseInt(valor);
    function destruir() 
    {
        let parte1 = document.getElementById("parte1");
        let destruir_data = document.getElementById("iddata");
        let destruir_descricao = document.getElementById("iddescricao");
        let destruir1 = parte1.removeChild(destruir_data);
        let destruir2 = parte1.removeChild(destruir_descricao);

        let meio = document.getElementById("meio");
        let destruir_select = document.getElementById("options");
        let destruir3 = meio.removeChild(destruir_select);

        let parte2 = document.getElementById("parte2");
        let destruir_valor = document.getElementById("idvalor");
        let destruir4 = parte2.removeChild(destruir_valor);

        valor2--;
        parte0.innerHTML = valor2;
    }
</script>