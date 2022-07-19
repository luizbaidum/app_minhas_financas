<?php require '../obj/classes.php'; require '../server/conectar.php' ?>
<html>
    <header>
        <link rel="stylesheet" href="../CSS/estilo_lote.css">
    </header>

    <body>
        <h2>Cadastrar lançamentos de despesas</h2> <br>

        <div class="botoes">

            <form action="despesas_lote.php">

                <input type="number" placeholder="Qtd. lançamentos" name="numero" id="numero">

                <!-- <input type="hidden" value='despesa' name="despesa"> -->
                <button id="criar">Adicionar</button> ou&nbsp;
            </div>

            <button type="button" onclick="destruir()">Remover linha</button>
        </div>  

        <span style="width: 300px; margin: 5px;">Linhas para lançamento: <span id="parte0"> </span></span>

        <form method="post" action="../obj/instanciacao_lote.php">
            
            <div id="agrupamento" class="agrupamento">

                <div id="parte1" style="width: 320px; margin: 5px 0px;"> </div>

                <div class="grupo-despesa" id="meio">
                
                    <?php
                        if(isset($_GET['numero'])) {
                            $numero = $_GET['numero'];
                            do {
                                require 'recuperaLancamentos.php';
                                echo "<select name=grupoDespesa[$numero] id='options'>";
                                echo "<option value='null'>Selecione</option>";
                                while($linha = $retorno_despesas->fetch(PDO::FETCH_OBJ))
                                    {	
                                        echo '<option value='.$linha->id_grupo.'>'.$linha->nome_grupo.'</option>';
                                    };
                                echo "</select>";
            
                                $numero--;
                            } while ($numero>=0);
                        }
                    ?>
                </div>
                <div id="parte2" style="width: 190px; margin: 5px 0px 5px 5px;"> </div>
            </div>

            <input type="submit" name="lancarDespesa" value="Lançar despesas">
        </form>  
    </body>

    <?php 
        if(isset($_GET['numero'])) {
            include "teste.php";
        } else {
            echo 'nooo';
        };
    ?>

</html>