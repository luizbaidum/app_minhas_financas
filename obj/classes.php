<?php
	session_start();

	class Apoio {
	
		protected $id_lancamento;
		protected $id_grupo;
		protected $data;
		protected $descricao;
		protected $valor;

		public function getId_lancamento()
		{

			return $this->id_lancamento;
		}

		public function setId_lancamento($id_lancamento)
		{

			$this->id_lancamento = $id_lancamento;
		}

		public function getId_grupo()
		{

			return $this->id_grupo;
		}

		public function setId_grupo($id_grupo)
		{

			$this->id_grupo = $id_grupo;
		}

		public function getData()
		{

			return $this->data;
		}

		public function setData($data)
		{

			$this->data = $data;
		}

		public function getDescricao()
		{

			return $this->descricao;
		}

		public function setDescricao($descricao)
		{

			$this->descricao = $descricao;
		}

		public function getValor()
		{

			return $this->valor;
		}

		public function setValor($valor)
		{

			$this->valor = $valor;
		}
	}

	class Grupo {

		protected $id_grupo;
		protected $tipo_grupo;
		protected $nome_grupo;

		public function getId_grupo()
		{

			return $this->id_grupo;
		}

		public function setId_grupo($id_grupo)
		{

			$this->id_grupo = $id_grupo;
		}

		public function getTipo_grupo() 
		{

			return $this->tipo_grupo;
		}

		public function setTipo_grupo($tipo_grupo)
		{

			$this->tipo_grupo = $tipo_grupo;
		}

		public function getNome_grupo()
		{

			return $this->nome_grupo;
		}

		public function setNome_grupo($nome_grupo)
		{

			$this->nome_grupo = $nome_grupo;
		}
	}

	class Receita extends Apoio {

	}

	class Despesa extends Apoio {

		public function setValor($valor)
		{

			$this->valor = $valor*-1;
		}

	}