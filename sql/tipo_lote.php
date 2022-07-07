<?php require '../obj/classes.php'; require __DIR__ .'\..\server - protejer\conectar.php'; ?>

<h2>Cadastrar tipo de receita ou despesa</h2> <br>

<form method="post" action="tipo_lote.php">

    <input type="radio" name="opcaoGrupo" value="receita">
    <label for="html">Cadastrar como Tipo de Receita</label><br>
    <input type="radio" name="opcaoGrupo" value="despesa">
    <label for="css">Cadastrar como Tipo de Despesa</label><br><br>

    <button type="button" onclick="novoInput()">Adc.</button> <button type="button" onclick="destruir()">Rem.</button> <br>

    <div id="fomulario" style="width: 280px; margin: 5px"></div>

    <input type="submit" name="cadastrarGrupo" value="Cadastrar">
</form>

<script>
    var i = -1;

    function novoInput() {

        i++;

        let formulario = document.getElementById("fomulario");
        let novo_input = document.createElement("input");
        novo_input.type = "text";
        novo_input.name = "nomeGrupo["+i+"]";
        novo_input.id = "idNomeGrupo-"+i;
        novo_input.style = "margin: 5px";
        novo_input.placeholder = "Nome";
        formulario.appendChild(novo_input);
    }

    function destruir() {

        let formulario = document.getElementById("fomulario");
        let destruir_item = document.getElementById("idNomeGrupo-"+i);
        let destruir = formulario.removeChild(destruir_item);
        
        i--;
    }
</script>

<?php

    if(isset($_POST['cadastrarGrupo'])) {

       if(in_array(null, $_POST) || in_array('', $_POST)) {

            echo 'Por favor, verifique se algum campo ficou em branco ou não foi selecionado e tente novamente';
        } else {
            foreach($_POST['nomeGrupo'] as $nome) {

                $opcao = $_POST['opcaoGrupo'];
                    
                $sql = $con->prepare("INSERT INTO grupos (nome_grupo, tipo_grupo) VALUES ('$nome', '$opcao')");
    
                $sql->execute();
            }
        }
	}
?>