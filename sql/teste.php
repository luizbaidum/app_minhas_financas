
<script>
                var criar = document.getElementById('criar');

                var numero = document.getElementById("numero");

                criar.onclick = function novosCampos()
                {   
                    let qtd = numero.value;

                    for(i = 0; qtd >= i; qtd--) {
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
                }

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
                }
            </script>
