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

		let linha = document.querySelectorAll('.delete');

		for(n = 0; n < linha.length; n++) {

			linha[n].addEventListener('click', function(){

				let linha_id = this.value;

				let data = document.getElementById("data-"+linha_id);
				let nome_grupo = document.getElementById("nome_grupo-"+linha_id);
				let descricao = document.getElementById("descricao-"+linha_id);
				let valor = document.getElementById("valor-"+linha_id);

				let resposta = confirm("Confirma a exclusão do item:  "+data.innerHTML+"  "+nome_grupo.innerHTML+"  "+descricao.innerHTML+"  R$"+valor.innerHTML+"  ?");

				resposta ? console.log('continuar') : this.name = 'cancelar';

				console.log(this.name);
			});
		}