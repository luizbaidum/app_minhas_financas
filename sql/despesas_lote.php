<?php require '../server/conectar.php' ?>

<html>

    <header>
        <link rel="stylesheet" href="../CSS/normalize.css">
        <link rel="stylesheet" href="../CSS/estilo.css">
        <style>
            body {
                margin: 2%;
            }
        </style>
    </header>

    <body>
        <h2>Cadastrar lançamentos de despesas</h2> <br>

        <div id="botoes">

            <form action="inclui-campo-lancamentos.php">

                <input type="number" placeholder="Qtd. lançamentos" name="numero">

                <input type="hidden" value='despesa' name="despesa">
                <button type="submit">Adicionar</button> ou &nbsp;
            </form>

            <button>Remover linha</button>
        </div>  

        <span style="width: 300px; margin: 5px;">Linhas para lançamento: <span id="parte0"> </span></span>

        <!-- <form method="post" action="../obj/instanciacao_lote.php"> -->
            
            <div id="agrupamento" class="agrupamento">

                <div id="parte1" style="width: 320px; margin: 5px 0px;"> </div>

                <div class="grupo-despesa" id="meio">
                    <?php if(isset($_GET['numero']) && $_GET['numero'] >= 1) {

                        $numero = $_GET['numero'];

                            for($a = 0; $numero > $a; $numero--) {

                                include 'campos-despesas.php';
                            }
                        }  
                    ?>
                </div>
                <div id="parte2" style="width: 190px; margin: 5px 0px 5px 5px;"> </div>
            </div>

            <input type="submit" name="lancarDespesa" value="Lançar despesas">
        <!-- </form> -->
    </body>

    <script>
        
        //var valor2 = parseInt(valor);
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

            //valor2--;
            //parte0.innerHTML = valor2;
        }
    </script>

</html>