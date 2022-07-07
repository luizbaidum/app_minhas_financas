<?php 

require __DIR__ .'\..\server - protejer\conectar.php';

//RECUPERA TIPOS DE DESPESAS (opções de despesas p/ lançamentos)
$retorno_despesas = $con->prepare("
		SELECT id_grupo, nome_grupo
		FROM grupos
		WHERE tipo_grupo = 'despesa'
		ORDER BY nome_grupo
	");

$retorno_despesas->execute();

//RECUPERA TIPOS DE RECEITAS (opções de receitas p/ lançamentos)
$retorno_receitas = $con->prepare("
		SELECT id_grupo, nome_grupo
		FROM grupos
		WHERE tipo_grupo = 'receita'
		ORDER BY nome_grupo
	");

$retorno_receitas->execute();

//-------------------------------//

//RECUPERA LANÇAMENTOS (despesas, receitas e todos)
$lancamentos_despesas = $con->prepare("
		SELECT id_lancamento, data, descricao, valor, grupos.id_grupo, grupos.tipo_grupo, grupos.nome_grupo
		FROM lancamentos
		INNER JOIN grupos ON lancamentos.id_grupo = grupos.id_grupo
		WHERE grupos.tipo_grupo = 'despesa'
		ORDER BY data
	");

$lancamentos_despesas -> execute();

$lancamentos_receitas = $con->prepare("
		SELECT id_lancamento, data, descricao, valor, grupos.id_grupo, grupos.tipo_grupo, grupos.nome_grupo
		FROM lancamentos
		INNER JOIN grupos ON lancamentos.id_grupo = grupos.id_grupo
		WHERE grupos.tipo_grupo = 'receita'
		ORDER BY data
	");

$lancamentos_receitas -> execute();

$lancamentos_todos = $con->prepare("
		SELECT id_lancamento, data, descricao, valor, grupos.id_grupo, grupos.tipo_grupo, grupos.nome_grupo
		FROM lancamentos
		INNER JOIN grupos ON lancamentos.id_grupo = grupos.id_grupo
		ORDER BY data
	");

$lancamentos_todos -> execute();

//-------------------------------//

//CONTA LANÇAMENTOS (despesas, receitas e todos)
$contar_todos = $con->prepare("
		SELECT COUNT(*)
		from lancamentos
	");

$contar_todos -> execute();

$contar_receitas = $con->prepare("
		SELECT data, descricao, valor, grupos.id_grupo, grupos.tipo_grupo, grupos.nome_grupo, COUNT(*)
		FROM lancamentos
		INNER JOIN grupos ON lancamentos.id_grupo = grupos.id_grupo
		WHERE grupos.tipo_grupo = 'receita'
	");

$contar_receitas -> execute();

$contar_despesas = $con->prepare("
		SELECT data, descricao, valor, grupos.id_grupo, grupos.tipo_grupo, grupos.nome_grupo, COUNT(*)
		FROM lancamentos
		INNER JOIN grupos ON lancamentos.id_grupo = grupos.id_grupo
		WHERE grupos.tipo_grupo = 'despesa'
	");

$contar_despesas -> execute();










